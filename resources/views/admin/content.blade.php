@extends('admin.layout')
@section('content')
<h1>Content</h1>
<p>Upload an image to replace the one currently shown on the website. Leave a field empty to keep the current image. Images are cropped to the existing layout dimensions automatically.</p>

<form method="post" enctype="multipart/form-data" action="{{ route('admin.content.update') }}">
  @csrf

  @php
    $sections = [
      ['key' => 'home_hero_image', 'title' => 'Home page cover photo', 'help' => 'The large background photo at the top of the home page.', 'fallback' => '/images/ozghan.webp', 'style' => 'width:min(100%,520px);aspect-ratio:16/9;object-fit:cover;'],
      ['key' => 'home_service_area_image', 'title' => 'Home page Service Area image', 'help' => 'The image shown in the Service Area section on the home page.', 'fallback' => '/images/service-area.avif', 'style' => 'width:min(100%,520px);aspect-ratio:4/3;object-fit:cover;'],
      ['key' => 'about_image', 'title' => 'About Us photo', 'help' => 'The photo shown next to the story on the About page.', 'fallback' => '/images/about-us.avif', 'style' => 'width:min(100%,420px);aspect-ratio:1/1;object-fit:cover;'],
      ['key' => 'site_logo', 'title' => 'Logo', 'help' => 'The logo shown in the site header and footer.', 'fallback' => '/logo.png', 'style' => 'width:120px;height:120px;object-fit:contain;background:#f2efea;'],
    ];
  @endphp

  @foreach($sections as $section)
    <div class="admin-card">
      <h2>{{ $section['title'] }}</h2>
      <p>{{ $section['help'] }}</p>
      <img src="{{ \App\Models\ContentSetting::resolveUrl($content[$section['key']] ?? null, $section['fallback']) }}" alt="Current {{ $section['title'] }}" style="display:block;{{ $section['style'] }}margin:0 0 16px;border-radius:4px;border:1px solid var(--line)">
      <div class="field">
        <label for="{{ $section['key'] }}">Replace image</label>
        <input id="{{ $section['key'] }}" type="file" name="{{ $section['key'] }}" accept="image/*,.avif">
      </div>
    </div>
  @endforeach

  <button class="btn" type="submit">Save changes</button>
</form>
@endsection
