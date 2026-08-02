<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\QuoteOption;
use App\Models\ServiceArea;
use App\Models\TilingService;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    private array $types = [
        'services' => [TilingService::class, 'Tiling services'],
        'areas' => [ServiceArea::class, 'Service areas'],
        'works' => [Work::class, 'Our work'],
        'quote-options' => [QuoteOption::class, 'Quote options'],
    ];

    public function dashboard()
    {
        $chartStart = now()->startOfDay();
        $chartEnd = $chartStart->copy();
        $chartDays = 1;
        $dailyCounts = collect();

        try {
            $orderDates = Order::orderBy('created_at')->get(['created_at']);
            if ($orderDates->isNotEmpty()) {
                $chartStart = \Illuminate\Support\Carbon::parse($orderDates->first()->created_at)->startOfDay();
                $chartEnd = \Illuminate\Support\Carbon::parse($orderDates->last()->created_at)->startOfDay();
                $chartDays = $chartStart->diffInDays($chartEnd) + 1;
            }
            $dailyCounts = $orderDates
                ->groupBy(fn (Order $order) => \Illuminate\Support\Carbon::parse($order->created_at)->format('Y-m-d'))
                ->map(fn ($orders) => $orders->count());
        } catch (\Throwable) {
            // Keep the dashboard renderable before the database is configured.
        }

        $orderChart = collect(range(0, $chartDays - 1))->map(function (int $offset) use ($chartStart, $dailyCounts) {
            $date = $chartStart->copy()->addDays($offset);
            return ['label' => $date->format('M j'), 'count' => (int) $dailyCounts->get($date->format('Y-m-d'), 0)];
        })->all();
        $maxOrders = max(1, ...array_column($orderChart, 'count'));
        $chartWidth = 800;
        $chartHeight = 260;
        $left = 42;
        $right = 18;
        $top = 20;
        $bottom = 42;
        $plotWidth = $chartWidth - $left - $right;
        $plotHeight = $chartHeight - $top - $bottom;
        $points = collect($orderChart)->map(function (array $day, int $index) use ($left, $top, $plotWidth, $plotHeight, $chartDays, $maxOrders) {
            $x = $left + ($index * ($plotWidth / max(1, $chartDays - 1)));
            $y = $top + (($maxOrders - $day['count']) / $maxOrders * $plotHeight);
            return ['x' => round($x, 2), 'y' => round($y, 2)];
        })->all();
        $linePoints = collect($points)->map(fn (array $point) => "{$point['x']},{$point['y']}")->implode(' ');
        $areaPoints = $linePoints . " {$points[array_key_last($points)]['x']}," . ($top + $plotHeight) . " {$points[0]['x']}," . ($top + $plotHeight);
        $labelIndexes = array_values(array_unique([0, intdiv($chartDays - 1, 2), $chartDays - 1]));

        return view('admin.dashboard', ['counts' => [
            'Tiling services' => TilingService::count(), 'Service areas' => ServiceArea::count(),
            'Our work' => Work::count(), 'Quote options' => QuoteOption::count(), 'Orders' => Order::count(),
        ], 'orderChart' => compact('orderChart', 'maxOrders', 'chartWidth', 'chartHeight', 'left', 'top', 'plotHeight', 'linePoints', 'areaPoints', 'points', 'labelIndexes')]);
    }

    public function index(string $type)
    {
        abort_unless(isset($this->types[$type]), 404);
        [$model, $label] = $this->types[$type];
        return view('admin.index', ['type' => $type, 'label' => $label, 'items' => $model::orderBy('sort_order')->orderByDesc('created_at')->get()]);
    }

    public function create(string $type)
    {
        abort_unless(isset($this->types[$type]), 404);
        return view('admin.form', ['type' => $type, 'label' => $this->types[$type][1], 'item' => null]);
    }

    public function store(Request $request, string $type)
    {
        return $this->save($request, $type);
    }

    public function edit(string $type, int $id)
    {
        abort_unless(isset($this->types[$type]), 404);
        [$model, $label] = $this->types[$type];
        return view('admin.form', ['type' => $type, 'label' => $label, 'item' => $model::findOrFail($id)]);
    }

    public function update(Request $request, string $type, int $id)
    {
        return $this->save($request, $type, $id);
    }

    public function destroy(string $type, int $id)
    {
        abort_unless(isset($this->types[$type]), 404);
        [$model] = $this->types[$type];
        $model::findOrFail($id)->delete();
        return back()->with('status', 'Deleted successfully.');
    }

    public function orders()
    {
        return view('admin.orders', ['orders' => Order::latest()->get()]);
    }

    public function showOrder(int $id)
    {
        return view('admin.order-details', ['order' => Order::findOrFail($id)]);
    }

    private function save(Request $request, string $type, ?int $id = null)
    {
        abort_unless(isset($this->types[$type]), 404);
        [$model] = $this->types[$type];
        $rules = match ($type) {
            'services' => ['title' => 'required|max:150', 'category' => 'nullable|max:50', 'description' => 'nullable|max:2000', 'image' => 'nullable|image|max:10240', 'sort_order' => 'integer|min:0', 'is_active' => 'nullable'],
            'areas' => ['name' => 'required|max:150', 'postcode' => 'nullable|max:20', 'description' => 'nullable|max:1000', 'sort_order' => 'integer|min:0', 'is_active' => 'nullable'],
            'works' => ['title' => 'required|max:150', 'category' => 'nullable|max:100', 'description' => 'nullable|max:2000', 'image' => 'nullable|image|max:10240', 'completed_at' => 'nullable|date', 'location' => 'nullable|max:150', 'area_m2' => 'nullable|numeric|min:0', 'sort_order' => 'integer|min:0', 'is_active' => 'nullable', 'is_featured' => 'nullable'],
            default => ['option_group' => 'required|max:80', 'label' => 'required|max:150', 'value' => 'required|max:150', 'sort_order' => 'integer|min:0', 'is_active' => 'nullable'],
        };
        $data = $request->validate($rules);
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store($type === 'services' ? 'services' : 'works', 'public');
        }
        $data['is_active'] = $request->boolean('is_active');
        if ($type === 'works') $data['is_featured'] = $request->boolean('is_featured');
        if (in_array($type, ['services', 'works'], true) && empty($data['slug'] ?? null)) $data['slug'] = Str::slug($data['title']);
        if ($id) $model::findOrFail($id)->update($data); else $model::create($data);
        return redirect("/admin/{$type}")->with('status', 'Saved successfully.');
    }
}
