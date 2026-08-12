<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach(['/', '/about', '/services', '/service-area', '/our-work', '/contact', '/quote'] as $path)
    <url><loc>{{ url($path) }}</loc></url>
@endforeach
</urlset>
