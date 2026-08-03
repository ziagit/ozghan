<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="{{ $seoType ?? 'website' }}">
<meta property="og:site_name" content="Ozghan.au">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('logo.png') }}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ asset('logo.png') }}">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    '@id' => 'https://ozghan.au/#business',
    'name' => 'Ozghan.au',
    'url' => 'https://ozghan.au',
    'logo' => asset('logo.png'),
    'image' => asset('logo.png'),
    'description' => $seoDescription,
    'email' => 'contact@ozghan.au',
    'priceRange' => '$$',
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Brisbane',
        'addressRegion' => 'QLD',
        'addressCountry' => 'AU',
    ],
    'areaServed' => ['@type' => 'City', 'name' => 'Brisbane'],
    'sameAs' => [],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
