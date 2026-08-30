@extends('admin.layout')
@section('content')
<style>
    .order-photo-grid{display:flex;flex-wrap:wrap;gap:12px}.order-photo{display:block;width:92px;height:72px;padding:0;border:1px solid #d8d0c6;border-radius:4px;background:#f2efea;overflow:hidden;cursor:pointer}.order-photo img{display:block;width:100%;height:100%;object-fit:cover}.order-photo:hover{border-color:#4091C5}
    .photo-modal{position:fixed;inset:0;display:none;align-items:center;justify-content:center;padding:24px;background:rgba(20,18,15,.82);z-index:100}.photo-modal.open{display:flex}.photo-modal img{max-width:min(100%,1000px);max-height:calc(100vh - 48px);object-fit:contain;box-shadow:0 16px 50px rgba(0,0,0,.4)}.photo-modal-close{position:absolute;top:18px;right:22px;border:0;background:transparent;color:#fff;font-size:34px;line-height:1;cursor:pointer}
</style>
<div class="actions"><h1 style="margin-right:auto">Order #{{ $order->id }}</h1><a class="btn btn-muted" href="{{ route('admin.orders') }}">Back to orders</a></div>
<div class="admin-card">
    <h2>Customer</h2>
    <p><strong>{{ $order->name }}</strong><br>{{ $order->email }}<br>{{ $order->phone }}</p>
    <h2>Work details</h2>
    <table class="table">
        <tr><th>Service</th><td>{{ $order->service }}</td></tr>
        <tr><th>Project type</th><td>{{ $order->project_type ?: '—' }}</td></tr>
        <tr><th>Indoor/outdoor</th><td>{{ $order->project_location ?: '—' }}</td></tr>
        <tr><th>Commercial property</th><td>{{ $order->commercial_property_type ?: '—' }}</td></tr>
        <tr><th>Address</th><td>{{ $order->address }}</td></tr>
        <tr><th>Preferred start date</th><td>{{ optional($order->preferred_date)->format('d M Y') ?: '—' }}</td></tr>
        <tr><th>Estimated area</th><td>{{ $order->estimated_area ? $order->estimated_area.' m²' : '—' }}</td></tr>
        <tr><th>Provides materials</th><td>{{ $order->materials_provided ? 'Yes' : 'No' }}</td></tr>
        <tr><th>Tile size</th><td>{{ $order->tile_size ?: '—' }}</td></tr>
        <tr><th>Status</th><td>{{ $order->status }}</td></tr>
        <tr><th>Note</th><td>{{ $order->note ?: 'No note provided.' }}</td></tr>
    </table>
    @if(count($order->photos ?? []))
        <h2>Photos</h2>
        <div class="order-photo-grid">
            @foreach($order->photos as $photo)
                <button class="order-photo" type="button" data-photo-url="{{ '/storage/'.ltrim($photo, '/') }}" aria-label="Open photo {{ $loop->iteration }}"><img src="{{ '/storage/'.ltrim($photo, '/') }}" alt="Order photo {{ $loop->iteration }}"></button>
            @endforeach
        </div>
    @endif
</div>
<div class="photo-modal" data-photo-modal role="dialog" aria-modal="true" aria-label="Order photo preview">
    <button class="photo-modal-close" type="button" data-photo-close aria-label="Close photo preview">×</button>
    <img data-photo-preview src="" alt="Expanded order photo">
</div>
<script>
    const photoModal = document.querySelector('[data-photo-modal]');
    const photoPreview = document.querySelector('[data-photo-preview]');
    const closePhotoModal = () => { photoModal.classList.remove('open'); photoPreview.src = ''; };
    document.querySelectorAll('[data-photo-url]').forEach((button) => button.addEventListener('click', () => {
        photoPreview.src = button.dataset.photoUrl;
        photoModal.classList.add('open');
    }));
    document.querySelector('[data-photo-close]').addEventListener('click', closePhotoModal);
    photoModal.addEventListener('click', (event) => { if (event.target === photoModal) closePhotoModal(); });
    document.addEventListener('keydown', (event) => { if (event.key === 'Escape') closePhotoModal(); });
</script>
@endsection
