<style>
  .site-header{position:sticky!important;top:0!important;z-index:50!important;background:var(--bg)!important;border-bottom:2px solid var(--ink)!important}
  .site-header-home{position:absolute!important;top:0!important;left:0!important;width:100%!important;background:transparent!important;border-bottom:0!important}
  .site-header-home .nav-links a{color:var(--white)!important}
  .site-header-home .brand, .site-header-home .brand small{color:var(--white)!important}
  .site-header-home .nav-toggle span, .site-header-home .nav-toggle span::before, .site-header-home .nav-toggle span::after{background:var(--white)!important}
  .site-header .nav{display:flex!important;align-items:center!important;justify-content:space-between!important;gap:0!important;padding-top:18px!important;padding-bottom:18px!important}
  .site-header .brand{display:flex!important;align-items:center!important;gap:12px!important;font-family:var(--font-display, var(--display, Arial))!important;font-weight:800!important;font-size:1.3rem!important;letter-spacing:-.02em!important}
  .site-header .brand img{display:block!important;width:30px!important;height:30px!important;object-fit:contain!important}
  .site-header .brand>span:last-child{display:flex!important;flex-direction:column!important;justify-content:center!important;line-height:1!important}
  .site-header .brand small{margin-top:4px!important;line-height:1!important}
  .site-header .nav-links{display:flex!important;align-items:center!important;gap:32px!important}
  .site-header .nav-links a{font-size:.92rem!important;font-weight:600!important;padding:4px 2px!important;border-bottom:2px solid transparent!important}
  .site-header .nav-cta{display:flex!important;align-items:center!important;gap:18px!important}
  .site-header .nav-toggle{display:none!important;align-items:center!important;justify-content:center!important;width:44px!important;height:44px!important;padding:0!important}
  .site-header .nav-cta .btn{display:inline-flex!important;align-items:center!important;justify-content:center!important;gap:8px!important;width:auto!important;height:auto!important;min-height:52px!important;padding:14px 28px!important;border:2px solid transparent!important;border-radius:2px!important;font-family:inherit!important;font-size:.95rem!important;font-weight:700!important;line-height:1.6!important;box-sizing:border-box!important}
  @media(max-width:860px){.site-header .nav-links{position:absolute!important;top:100%!important;left:0!important;right:0!important;background:#171513!important;border-bottom:3px solid var(--clay)!important;box-shadow:0 14px 28px rgba(0,0,0,.28)!important;flex-direction:column!important;align-items:flex-start!important;gap:0!important;padding:12px 24px 24px!important;display:none!important}.site-header .nav-links.open{display:flex!important}.site-header .nav-links a{width:100%!important;color:#F2EFEA!important;font-size:1.08rem!important;font-weight:700!important;line-height:1.4!important;padding:16px 4px!important;border-bottom:1px solid rgba(242,239,234,.18)!important}.site-header .nav-links a:last-child{border-bottom:0!important}.site-header .nav-links a:hover,.site-header .nav-links a[aria-current="page"]{color:#FFFFFF!important;border-color:var(--clay)!important}.site-header .nav-toggle{display:inline-flex!important}.site-header .nav-cta .btn{display:none!important}.site-header .nav-toggle[aria-expanded="true"] span{background:transparent!important}.site-header .nav-toggle[aria-expanded="true"] span::before,.site-header .nav-toggle[aria-expanded="true"] span::after{top:0!important;background:#F2EFEA!important}.site-header .nav-toggle[aria-expanded="true"] span::before{transform:rotate(45deg)!important}.site-header .nav-toggle[aria-expanded="true"] span::after{transform:rotate(-45deg)!important}}
</style>
@unless(request()->is('admin/login'))
<a class="sr-only" href="#main">Skip to content</a>
@endunless
<header class="site-header @if(request()->is('/')) site-header-home @endif">
  <div class="container nav">
    <a href="/" class="brand" aria-label="Ozghan.com home">
      <img class="brand-mark brand-logo" src="/logo2.png" alt="" width="30" height="30" decoding="async">
      <span>Ozghan<small>TILING SERVICES</small></span>
    </a>
    <nav id="primary-navigation" class="nav-links" aria-label="Primary">
      <a href="/" data-nav="home" @if(request()->is('/')) aria-current="page" @endif>Home</a>
      <a href="/services#residential-tiling" data-nav="residential">Residential</a>
      <a href="/services#commercial-tiling" data-nav="commercial">Commercial</a>
      <a href="/service-area" data-nav="area" @if(request()->is('service-area')) aria-current="page" @endif>Service area</a>
      <a href="/our-work" data-nav="work" @if(request()->is('our-work*')) aria-current="page" @endif>Our work</a>
      <a href="/about" data-nav="about" @if(request()->is('about')) aria-current="page" @endif>About</a>
      <a href="/contact" data-nav="contact" @if(request()->is('contact')) aria-current="page" @endif>Contact</a>
    </nav>
    <div class="nav-cta">
      <a class="btn btn-primary" href="/quote">Get a Quote</a>
      <button class="nav-toggle" type="button" aria-label="Toggle menu" aria-controls="primary-navigation" aria-expanded="false"><span></span></button>
    </div>
  </div>
</header>
