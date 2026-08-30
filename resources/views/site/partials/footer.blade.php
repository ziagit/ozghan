<style>
  .social-links{display:flex;gap:12px;margin-top:18px}
  .social-links a{display:inline-flex;width:28px;height:28px;align-items:center;justify-content:center;color:inherit;border:1px solid currentColor;opacity:.8;transition:opacity .15s ease,background .15s ease,color .15s ease}
  .social-links a:hover{opacity:1;background:var(--clay-tint);color:var(--ink)}
  .social-links svg{width:16px;height:16px;display:block}
</style>
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="brand" style="color:var(--bg); margin-bottom:14px;">
          <img class="brand-mark brand-logo" src="{{ $siteLogoUrl ?? '/logo.png' }}" alt="" width="30" height="30" loading="lazy" decoding="async">
          <span>Ozghan</span>
        </div>
        <p>Brisbane tiling for bathrooms, kitchens, floors and commercial fit-outs — laid level, laid true.</p>
      </div>
      <div><h4>Services</h4><ul><li><a href="/services">Tiling Services</a></li><li><a href="/service-area">Service Area</a></li><li><a href="/our-work">Our Work</a></li></ul></div>
      <div><h4>Company</h4><ul><li><a href="/about">About</a></li><li><a href="/contact">Contact</a></li><li><a href="/quote">Quotation</a></li><li><a href="/faq">FAQ</a></li><li><a href="{{ route('admin.login') }}">Login</a></li></ul></div>
      <div><h4>Contact</h4><ul class="contact-list"><li>Brisbane, QLD</li><li><a href="mailto:info@ozghan.com.au">info@ozghan.com.au</a></li><li><a href="tel:+61468430893">0468 430 893</a></li></ul><div class="social-links" aria-label="Social media"><a href="https://www.facebook.com/share/19FtJtrxP6/" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M14 8h3V4h-3c-3.3 0-5 1.9-5 5v3H6v4h3v4h4v-4h3l1-4h-4V9c0-.7.3-1 1-1z"/></svg></a><a href="https://www.instagram.com/ozghan2024?igsh=MWExdTdhNnhuZWJ6dA==" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg></a><a href="https://www.tiktok.com/@ozghan2024" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M15.5 4h3.1c.2 1.8 1.2 3.1 3 3.7v3.2c-1.2 0-2.3-.3-3.3-.9v5.7a5.3 5.3 0 1 1-5.3-5.3c.4 0 .8 0 1.2.1v3.3a2.2 2.2 0 1 0 .8 1.7V4h.5Z"/></svg></a></div></div>
    </div>
    <div class="footer-bottom"><span>&copy; 2026 Ozghan.com.au — All rights reserved.</span><span>ABN 12682122210 &middot; Licensed &amp; insured</span></div>
  </div>
</footer>
