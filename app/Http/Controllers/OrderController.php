<?php

namespace App\Http\Controllers;

use App\Mail\OrderReceived;
use App\Mail\ContactMessageReceived;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function contact(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Mail::to(config('mail.admin_address', 'info@ozghan.com.au'))
            ->send(new ContactMessageReceived(
                $data['name'],
                $data['email'],
                $data['phone'] ?? '',
                $data['message'],
            ));

        return response()->json(['message' => 'Your message has been sent.'], 201);
    }

    public function uploadPhotos(Request $request)
    {
        $data = $request->validate([
            'photos' => ['required', 'array', 'min:1', 'max:5'],
            'photos.*' => ['required', 'image', 'max:10240'],
        ]);

        $photos = collect($data['photos'])->map(function ($photo) {
            $path = $photo->store('orders', 'public');
            return ['path' => $path, 'url' => '/storage/'.ltrim($path, '/'), 'name' => $photo->getClientOriginalName()];
        })->values();

        return response()->json(['photos' => $photos], 201);
    }

    public function removePhoto(Request $request)
    {
        $data = $request->validate([
            'path' => ['required', 'string', 'regex:/^orders\\/[A-Za-z0-9._\\/-]+$/'],
        ]);
        if (Storage::disk('public')->exists($data['path'])) {
            Storage::disk('public')->delete($data['path']);
        }
        return response()->json(['message' => 'Photo removed.']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_type' => ['nullable', 'string', 'max:50'],
            'project_location' => ['nullable', 'in:Indoor,Outdoor'],
            'commercial_type' => ['nullable', 'string', 'max:100'],
            'service' => ['required', 'string', 'max:120'],
            'address' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'area' => ['nullable', 'numeric', 'min:0'],
            'materials' => ['nullable'],
            'tile_size' => ['nullable', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['required', 'regex:/^(?:04[0-9]{2}(?:\s?[0-9]{3}){2}|\+61\s?4[0-9]{2}(?:\s?[0-9]{3}){2})$/'],
            'note' => ['nullable', 'string', 'max:2000'],
            'photos' => ['nullable', 'array', 'max:5'],
            'photos.*' => ['image', 'max:10240'],
            'uploaded_photos' => ['nullable', 'array', 'max:5'],
            'uploaded_photos.*' => ['string', 'regex:/^orders\\/[A-Za-z0-9._\\/-]+$/'],
        ]);

        $photoPaths = collect($data['uploaded_photos'] ?? [])
            ->filter(fn (string $path) => Storage::disk('public')->exists($path))
            ->values()
            ->all();
        foreach ($request->file('photos', []) as $photo) {
            if (count($photoPaths) < 5) $photoPaths[] = $photo->store('orders', 'public');
        }

        $order = Order::create([
            'project_type' => $data['project_type'] ?? null,
            'project_location' => $data['project_location'] ?? null,
            'commercial_property_type' => $data['commercial_type'] ?? null,
            'service' => $data['service'],
            'address' => $data['address'],
            'preferred_date' => $data['date'] ?? null,
            'estimated_area' => $data['area'] ?? null,
            'materials_provided' => $request->boolean('materials'),
            'tile_size' => $data['tile_size'] ?? null,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'note' => $data['note'] ?? null,
            'photos' => $photoPaths,
        ]);

        try {
            // Send this notification during the request. The application uses the
            // database queue by default, but no worker is guaranteed to be running
            // in production; queueing here could leave the notification stranded
            // in the jobs table even though the order was saved successfully.
            Mail::to(config('mail.admin_address', 'info@ozghan.com.au'))->send(new OrderReceived($order));
        } catch (\Throwable $exception) {
            Log::error('Order notification email could not be sent.', [
                'order_id' => $order->id,
                'error' => $exception->getMessage(),
            ]);

            return response()->json(['message' => 'The quotation was saved, but the notification email could not be sent.'], 500);
        }

        return response()->json(['message' => 'Quote request received.', 'id' => $order->id], 201);
    }
}
