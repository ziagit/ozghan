<!doctype html>
<html lang="en">
<body style="font-family:Arial,sans-serif;color:#23201c;line-height:1.5">
    <h1>New quote request #{{ $order->id }}</h1>
    <p>A new quotation request was submitted through the Ozghan website.</p>
    <h2>Customer</h2>
    <p><strong>{{ $order->name }}</strong><br>{{ $order->email }}<br>{{ $order->phone }}</p>
    <h2>Project</h2>
    <p>
        <strong>Service:</strong> {{ $order->service }}<br>
        <strong>Type:</strong> {{ $order->project_type ?: '—' }}<br>
        <strong>Location:</strong> {{ $order->project_location ?: '—' }}<br>
        <strong>Commercial property:</strong> {{ $order->commercial_property_type ?: '—' }}<br>
        <strong>Address:</strong> {{ $order->address }}<br>
        <strong>Preferred date:</strong> {{ $order->preferred_date?->format('d M Y') ?: '—' }}<br>
        <strong>Estimated area:</strong> {{ $order->estimated_area ? $order->estimated_area.' m²' : '—' }}<br>
        <strong>Submitted:</strong> {{ $order->created_at?->format('d M Y, g:i a') ?: '—' }}
    </p>
    <h2>Customer note</h2>
    <p>{{ $order->note ?: 'No note provided.' }}</p>
    @if(count($order->photos ?? []))
        <h2>Photos</h2>
        <ul>@foreach($order->photos as $photo)<li>{{ url('/storage/'.$photo) }}</li>@endforeach</ul>
    @endif
</body>
</html>
