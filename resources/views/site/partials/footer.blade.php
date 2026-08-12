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
          <img class="brand-mark brand-logo" src="/logo.png" alt="">
          <span>Ozghan</span>
        </div>
        <p>Brisbane tiling for bathrooms, kitchens, floors and commercial fit-outs — laid level, laid true.</p>
        <a href="{{ route('admin.login') }}">Login</a>
      </div>
      <div><h4>Site</h4><ul><li><a href="/about">About</a></li><li><a href="/services">Services</a></li><li><a href="/our-work">Our Work</a></li><li><a href="/service-area">Service Area</a></li></ul></div>
      <div><h4>Services</h4><ul><li><a href="/services#bathroom-tiling">Bathroom Tiling</a></li><li><a href="/services#floor-tiling">Floor Tiling</a></li><li><a href="/services#waterproofing">Waterproofing</a></li><li><a href="/services#commercial-tiling">Commercial Tiling</a></li></ul></div>
      <div><h4>Contact</h4><ul class="contact-list"><li>Brisbane, QLD</li><li><a href="mailto:contact@ozghan.com">contact@ozghan.com</a></li></ul><div class="social-links" aria-label="Social media"><a href="https://www.facebook.com/" target="_blank" rel="noopener" aria-label="Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M14 8h3V4h-3c-3.3 0-5 1.9-5 5v3H6v4h3v4h4v-4h3l1-4h-4V9c0-.7.3-1 1-1z"/></svg></a><a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg></a><a href="https://www.youtube.com/" target="_blank" rel="noopener" aria-label="YouTube"><svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M21.6 7.2a2.8 2.8 0 0 0-2-2C17.8 4.7 12 4.7 12 4.7s-5.8 0-7.6.5a2.8 2.8 0 0 0-2 2C2 9 2 12 2 12s0 3 .4 4.8a2.8 2.8 0 0 0 2 2c1.8.5 7.6.5 7.6.5s5.8 0 7.6-.5a2.8 2.8 0 0 0 2-2c.4-1.8.4-4.8.4-4.8s0-3-.4-4.8ZM10 15.3V8.7l5.5 3.3Z"/></svg></a></div></div>
    </div>
    <div class="footer-bottom"><span>&copy; 2026 Ozghan.com — All rights reserved.</span><span>ABN 12682122210 &middot; Licensed &amp; insured</span></div>
  </div>
</footer>
