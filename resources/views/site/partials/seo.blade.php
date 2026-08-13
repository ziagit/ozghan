<link rel="canonical" href="{{ url()->current() }}">
<meta name="theme-color" content="#23201C">
<meta property="og:type" content="{{ $seoType ?? 'website' }}">
<meta property="og:site_name" content="Ozghan.com">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/home-hero.jpeg') }}">
<meta property="og:image:alt" content="Brisbane tiling services by Ozghan.com">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ asset('images/home-hero.jpeg') }}">
<meta name="twitter:image:alt" content="Brisbane tiling services by Ozghan.com">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    '@id' => 'https://ozghan.com/#business',
    'name' => 'Ozghan.com',
    'url' => 'https://ozghan.com',
    'logo' => asset('logo.png'),
    'image' => asset('logo.png'),
    'description' => $seoDescription,
    'telephone' => '+61468430893',
    'serviceType' => [
        'Bathroom tiling', 'Kitchen tiling', 'Floor tiling',
        'Wall tiling', 'Outdoor tiling', 'Commercial tiling', 'Waterproofing',
    ],
    'email' => 'contact@ozghan.com',
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
