@extends('admin.layout')
@section('content')
<h1>Content</h1>
<div class="admin-card">
  <h2>Home page Service Area image</h2>
  <p>Upload the image shown in the Service Area section on the home page. The image is cropped to the existing layout dimensions automatically.</p>
  @if($homeServiceAreaImage)
    <img src="/storage/{{ ltrim($homeServiceAreaImage, '/') }}" alt="Current home page Service Area image" style="display:block;width:min(100%,520px);aspect-ratio:4/3;object-fit:cover;margin:0 0 20px;border-radius:4px;">
  @endif
  <form method="post" enctype="multipart/form-data" action="{{ route('admin.content.update') }}">
    @csrf
    <div class="field">
      <label for="home-service-area-image">Service Area image</label>
      <input id="home-service-area-image" type="file" name="home_service_area_image" accept="image/*,.avif" required>
    </div>
    <button class="btn" type="submit">Save image</button>
  </form>
</div>
@endsection
