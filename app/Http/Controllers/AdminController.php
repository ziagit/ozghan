<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\QuoteOption;
use App\Models\ServiceArea;
use App\Models\TilingService;
use App\Models\Work;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    private array $types = [
        'services' => [TilingService::class, 'Tiling services'],
        'areas' => [ServiceArea::class, 'Service areas'],
        'works' => [Work::class, 'Our work'],
        'quote-options' => [QuoteOption::class, 'Quote options'],
        'faqs' => [Faq::class, 'FAQs'],
    ];

    public function profile()
    {
        return view('admin.profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ]);

        $user->update($data);

        return back()->with('status', 'Profile details updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->forceFill([
            'password' => Hash::make($data['password']),
        ])->save();

        return back()->with('status', 'Password updated successfully.');
    }

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
            'Our work' => Work::count(), 'Quote options' => QuoteOption::count(), 'FAQs' => Faq::count(), 'Orders' => Order::count(),
        ], 'orderChart' => compact('orderChart', 'maxOrders', 'chartWidth', 'chartHeight', 'left', 'top', 'plotHeight', 'linePoints', 'areaPoints', 'points', 'labelIndexes')]);
    }

    public function index(string $type)
    {
        abort_unless(isset($this->types[$type]), 404);
        [$model, $label] = $this->types[$type];
        $query = $type === 'works'
            ? $model::orderByDesc('created_at')
            : $model::orderBy('sort_order')->orderByDesc('created_at');
        $items = $type === 'works' ? $query->paginate(18)->withQueryString() : $query->get();
        return view('admin.index', compact('type', 'label', 'items'));
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

    public function destroyWork(int $id)
    {
        $work = Work::findOrFail($id);

        if ($work->image_path && Storage::disk('public')->exists($work->image_path)) {
            Storage::disk('public')->delete($work->image_path);
        }

        $work->delete();

        return redirect()->route('admin.index', ['type' => 'works'])
            ->with('status', 'Work deleted successfully.');
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
            'services' => ['title' => 'required|max:150', 'category' => 'nullable|max:50', 'description' => 'nullable|max:2000', 'image' => ['nullable', 'file', 'mimetypes:image/jpeg,image/png,image/gif,image/webp,image/avif', 'max:10240'], 'sort_order' => 'integer|min:0', 'is_active' => 'nullable'],
            'areas' => ['name' => 'required|max:150', 'postcode' => 'nullable|max:20', 'description' => 'nullable|max:1000', 'sort_order' => 'integer|min:0', 'is_active' => 'nullable'],
            'works' => ['category' => 'required|in:Residential,Commercial', 'description' => 'nullable|max:2000', 'image' => ['nullable', 'file', 'mimetypes:image/jpeg,image/png,image/gif,image/webp,image/avif', 'max:10240']],
            'faqs' => ['question' => 'required|max:255', 'answer' => 'required|max:5000', 'sort_order' => 'integer|min:0', 'is_active' => 'nullable'],
            default => ['option_group' => 'required|max:80', 'label' => 'required|max:150', 'value' => 'required|max:150', 'sort_order' => 'integer|min:0', 'is_active' => 'nullable'],
        };
        $data = $request->validate($rules);
        $existing = $id ? $model::findOrFail($id) : null;
        if ($type === 'works') {
            $data['slug'] = $existing?->slug ?: Str::slug($data['category'].'-'.Str::random(8));
            $data['is_featured'] = $existing?->is_featured ?? false;
            if (Schema::hasColumn('works', 'title')) {
                $data['title'] = $existing?->title ?: 'Tiling work';
            }
            if (Schema::hasColumn('works', 'is_active')) {
                $data['is_active'] = $existing?->is_active ?? true;
            }
        }
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store($type === 'services' ? 'services' : 'works', 'public');
        }
        if ($type !== 'works') $data['is_active'] = $request->boolean('is_active');
        if ($type === 'services' && empty($data['slug'] ?? null)) $data['slug'] = Str::slug($data['title']);
        if ($id) $model::findOrFail($id)->update($data); else $model::create($data);
        return redirect("/admin/{$type}")->with('status', 'Saved successfully.');
    }
}
