<link rel="canonical" href="{{ url()->current() }}">
<meta name="theme-color" content="#23201C">
<meta property="og:type" content="{{ $seoType ?? 'website' }}">
<meta property="og:site_name" content="Ozghan.com.au">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/ozghan.webp') }}">
<meta property="og:image:type" content="image/webp">
<meta property="og:image:alt" content="Brisbane tiling services by Ozghan.com.au">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ asset('images/ozghan.webp') }}">
<meta name="twitter:image:alt" content="Brisbane tiling services by Ozghan.com.au">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    '@id' => 'https://ozghan.com.au/#business',
    'name' => 'Ozghan.com.au',
    'url' => 'https://ozghan.com.au',
    'logo' => asset('logo.png'),
    'image' => asset('images/ozghan.webp'),
    'description' => $seoDescription,
    'telephone' => '+61468430893',
    'serviceType' => [
        'Bathroom tiling', 'Kitchen tiling', 'Floor tiling',
        'Wall tiling', 'Outdoor tiling', 'Commercial tiling', 'Waterproofing',
    ],
    'email' => 'info@ozghan.com.au',
    'sameAs' => [
        'https://www.facebook.com/share/19FtJtrxP6/',
        'https://www.instagram.com/ozghan2024',
        'https://www.tiktok.com/@ozghan2024',
    ],
    'priceRange' => '$$',
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Brisbane',
        'addressRegion' => 'QLD',
        'addressCountry' => 'AU',
    ],
    'areaServed' => [
        ['@type' => 'City', 'name' => 'Brisbane'],
        ['@type' => 'AdministrativeArea', 'name' => 'Queensland'],
    ],
    'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+61468430893',
        'contactType' => 'customer service',
        'areaServed' => 'AU',
        'availableLanguage' => 'en-AU',
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
