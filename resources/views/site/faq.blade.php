<!DOCTYPE html>
<html lang="en-AU">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAQ | Brisbane Tiling Questions | Ozghan.com.au</title>
<meta name="description" content="Answers to common questions about Ozghan's Brisbane tiling services, quotes, waterproofing, materials and project timelines.">
@include('site.partials.seo', ['seoTitle' => 'FAQ | Brisbane Tiling Questions | Ozghan.com.au', 'seoDescription' => "Answers to common questions about Ozghan's Brisbane tiling services, quotes, waterproofing, materials and project timelines."])
<script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $faqs->map(fn ($faq) => ['@type' => 'Question', 'name' => $faq->question, 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq->answer]])->values()->all()], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')], ['@type' => 'ListItem', 'position' => 2, 'name' => 'FAQ', 'item' => url('/faq')]]], JSON_UNESCAPED_SLASHES) !!}</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{--bg:#F2EFEA;--bg-alt:#E8E1D6;--ink:#23201C;--ink-soft:#5B564F;--clay:#4091C5;--clay-dark:#174B57;--clay-tint:#B9D7DC;--white:#FFF;--font-display:'Manrope',Arial,sans-serif;--font-body:'Manrope',Arial,sans-serif;--font-mono:'IBM Plex Mono',monospace;--line:rgba(35,32,28,.16);--container:1200px}
*,*::before,*::after{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--bg);color:var(--ink);font:16px/1.6 var(--font-body);-webkit-font-smoothing:antialiased}a{color:inherit;text-decoration:none}.container{max-width:var(--container);margin:0 auto;padding:0 24px}h1,h2,h3{font-family:var(--font-display);line-height:1.08;letter-spacing:-.02em}p{color:var(--ink-soft)}a:focus-visible,button:focus-visible,summary:focus-visible{outline:2px solid var(--clay);outline-offset:3px}.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
.page-header{background:var(--ink);color:var(--bg);padding:64px 0 48px}.page-header h1{color:var(--bg);font-size:clamp(2rem,4vw,2.8rem);margin:0 0 .5em}.breadcrumb{font:12px var(--font-mono);letter-spacing:.12em;text-transform:uppercase;color:var(--clay-tint);margin-bottom:16px}.faq-section{padding:72px 0 96px}.faq-intro{max-width:640px;margin-bottom:34px}.faq-intro h2{font-size:clamp(1.8rem,4vw,2.5rem);margin:0 0 10px}.faq-list{max-width:900px;border-top:2px solid var(--ink)}.faq-item{border-bottom:1px solid var(--line);background:var(--white)}.faq-item summary{cursor:pointer;list-style:none;padding:22px 56px 22px 22px;font:700 1.08rem/1.4 var(--font-display);position:relative}.faq-item summary::-webkit-details-marker{display:none}.faq-item summary::after{content:'+';position:absolute;right:22px;top:18px;color:var(--clay);font:400 1.8rem var(--font-display)}.faq-item[open] summary::after{content:'−'}.faq-answer{padding:0 22px 24px;max-width:760px}.faq-answer p{margin:0}.faq-empty{max-width:900px;background:var(--white);border:1px solid var(--line);padding:24px}.faq-cta{background:var(--bg-alt);padding:44px 0}.faq-cta-inner{display:flex;justify-content:space-between;align-items:center;gap:24px}.faq-cta h2{margin:0 0 6px}.faq-cta p{margin:0}.btn{display:inline-flex;align-items:center;justify-content:center;min-height:50px;padding:13px 24px;background:var(--clay);color:var(--white);font-weight:700;border-radius:2px;white-space:nowrap}.btn:hover{background:var(--clay-dark)}
.site-footer{background:var(--ink);color:var(--bg);padding:56px 0 22px}.site-footer p{color:#C9C4BB}.footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:32px;padding-bottom:40px}.footer-grid h4{color:var(--bg);font-size:.85rem;text-transform:uppercase;letter-spacing:.08em;margin:0 0 16px}.footer-grid ul{list-style:none;padding:0;margin:0}.footer-grid li{margin:0 0 8px}.footer-grid a{color:#C9C4BB}.footer-grid a:hover{color:var(--white)}.footer-bottom{border-top:1px solid rgba(255,255,255,.16);padding-top:18px;color:#8B857C;font-size:.82rem;display:flex;justify-content:space-between;gap:16px}
@media(max-width:760px){.footer-grid{grid-template-columns:1fr 1fr}.footer-bottom{display:block}.footer-bottom span{display:block;margin-bottom:6px}}@media(max-width:640px){.container{padding:0 20px}.faq-hero{padding:64px 0 56px}.faq-section{padding:52px 0 68px}.faq-item summary{padding:18px 48px 18px 16px;font-size:1rem}.faq-item summary::after{right:16px;top:14px}.faq-answer{padding:0 16px 20px}.faq-cta-inner{display:block}.faq-cta .btn{margin-top:20px;width:100%}}@media(max-width:480px){.footer-grid{grid-template-columns:1fr}}
</style>
</head>
<body>
@include('site.partials.header')
<main id="main">
  <header class="page-header" style="background:#2F78A8">
    <div class="container">
      <div class="breadcrumb">Frequently asked questions</div>
      <h1>Answers before your Brisbane tiling project begins</h1>
      <p>Find practical answers about our services, quoting process, preparation, waterproofing and project timelines.</p>
    </div>
  </header>
  <section class="faq-section" aria-labelledby="faq-heading">
    <div class="container">
      <div class="faq-intro"><h2 id="faq-heading">Common questions</h2><p>If you cannot find what you need, contact us and we will talk through your project.</p></div>
      @if($faqs->isNotEmpty())
        <div class="faq-list">
          @foreach($faqs as $faq)
            <details class="faq-item">
              <summary>{{ $faq->question }}</summary>
              <div class="faq-answer">{!! nl2br(e($faq->answer)) !!}</div>
            </details>
          @endforeach
        </div>
      @else
        <p class="faq-empty">FAQs are being updated. Please contact us for help with your tiling project.</p>
      @endif
    </div>
  </section>
  <section class="faq-cta"><div class="container faq-cta-inner"><div><h2>Still have a question?</h2><p>Tell us what you are planning and we will help you work out the next step.</p></div><a class="btn" href="/quote">Request a quote</a></div></section>
</main>
@include('site.partials.footer')
</body>
</html>
