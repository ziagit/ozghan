<!DOCTYPE html>
<html lang="en-AU">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>About | Ozghan.au Brisbane Tiling</title>
<meta name="description" content="Learn about Ozghan, a Brisbane tiling company focused on precision, reliability and craftsmanship.">
@include('site.partials.seo', ['seoTitle' => 'About Ozghan.au | Brisbane Tiling', 'seoDescription' => 'Learn about Ozghan, a Brisbane tiling company focused on precision, reliability and craftsmanship.'])
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
/* =========================================================
   Ozghan.au — Brisbane Tiling
   Design tokens
   ========================================================= */
:root{
  --bg:            #F2EFEA;   /* porcelain */
  --bg-alt:        #E8E1D6;   /* raw stone */
  --ink:           #23201C;   /* charcoal grout */
  --ink-soft:      #5B564F;
  --clay:          #B8541F;   /* fired clay / brick terracotta */
  --clay-dark:     #8F3F16;
  --clay-tint:     #E7C6AC;
  --slate:         #3B4A54;   /* wet-grout blue-grey */
  --line:          rgba(35,32,28,0.14);
  --line-strong:   rgba(35,32,28,0.28);
  --white:         #FFFFFF;

  --font-display:  'Manrope', Arial, sans-serif;
  --font-body:     'Manrope', Arial, sans-serif;
  --font-mono:     'IBM Plex Mono', monospace;

  --radius-sm: 2px;
  --radius-md: 4px;
  --container: 1200px;
  --grout: 2px; /* signature grout-line width used throughout */
}

*, *::before, *::after{ box-sizing:border-box; }
html{ scroll-behavior:smooth; }
body{
  margin:0;
  background:var(--bg);
  color:var(--ink);
  font-family:var(--font-body);
  font-size:16px;
  line-height:1.6;
  -webkit-font-smoothing:antialiased;
}
img{ max-width:100%; display:block; }
a{ color:inherit; text-decoration:none; }
ul{ margin:0; padding:0; list-style:none; }
h1,h2,h3,h4{ font-family:var(--font-display); margin:0 0 .5em; line-height:1.05; letter-spacing:-0.01em; }
p{ margin:0 0 1em; color:var(--ink-soft); }
button{ font-family:inherit; cursor:pointer; }

.container{
  max-width:var(--container);
  margin:0 auto;
  padding:0 24px;
}

/* Reduced motion respected */
@media (prefers-reduced-motion: reduce){
  *{ animation-duration:0.001ms !important; animation-iteration-count:1 !important; transition-duration:0.001ms !important; scroll-behavior:auto !important; }
}

/* visible keyboard focus */
a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible, select:focus-visible{
  outline:2px solid var(--clay);
  outline-offset:3px;
}

/* =========================================================
   Icon badges — reusable across pages
   ========================================================= */
.icon-badge{
  width:44px; height:44px; border-radius:50%;
  background:var(--clay-tint); color:var(--clay-dark);
  display:flex; align-items:center; justify-content:center;
  margin-bottom:16px; flex:none;
}
.icon-badge svg{ width:22px; height:22px; }
.icon-badge-dark{ background:rgba(255,255,255,0.12); color:var(--clay-tint); }
.icon-inline{ width:20px; height:20px; color:var(--clay); flex:none; }
.icon-inline svg{ width:100%; height:100%; display:block; }
.eyebrow-icon{ display:inline-flex; align-items:center; gap:8px; }
.eyebrow-icon .icon-inline{ width:16px; height:16px; }

.row-icon{
  width:18px; height:18px; color:var(--clay-tint); flex:none; margin-top:2px;
}
.row-icon svg{ width:100%; height:100%; display:block; }

/* =========================================================
   Signature element: grout-line grid
   A repeating tile-square motif used as dividers, backgrounds
   and structural rhythm throughout the site.
   ========================================================= */
.grout-rule{
  height:var(--grout);
  background:repeating-linear-gradient(90deg, var(--line) 0 40px, transparent 40px 42px);
  width:100%;
}
.tile-swatch{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:var(--grout);
  background:var(--ink);
}
.tile-swatch span{ display:block; aspect-ratio:1; background:var(--clay); }
.tile-swatch span:nth-child(2n){ background:var(--slate); }
.tile-swatch span:nth-child(5){ background:var(--clay-tint); }

/* =========================================================
   Buttons
   ========================================================= */
.btn{
  display:inline-flex;
  align-items:center;
  gap:8px;
  padding:14px 28px;
  border-radius:var(--radius-sm);
  font-weight:700;
  font-size:0.95rem;
  border:2px solid transparent;
  transition:transform .15s ease, background .15s ease, color .15s ease;
}
.btn-primary{ background:var(--clay); color:var(--white); }
.btn-primary:hover{ background:var(--clay-dark); transform:translateY(-1px); }
.btn-outline{ border-color:var(--ink); color:var(--ink); }
.btn-outline:hover{ background:var(--ink); color:var(--bg); }
.btn-ghost{ border-color:var(--white); color:var(--white); }
.btn-ghost:hover{ background:var(--white); color:var(--ink); }
.btn-block{ width:100%; justify-content:center; }

/* =========================================================
   Header / Nav
   ========================================================= */
.site-header{
  position:sticky; top:0; z-index:50;
  background:var(--bg);
  border-bottom:var(--grout) solid var(--ink);
}
.nav{
  display:flex; align-items:center; justify-content:space-between;
  padding-top:18px; padding-bottom:18px;
}
.brand{ display:flex; align-items:center; gap:10px; font-family:var(--font-display); font-weight:800; font-size:1.3rem; letter-spacing:-0.02em; }
.brand-mark{ width:22px; height:22px; display:grid; grid-template-columns:1fr 1fr; gap:2px; flex:none; }
.site-header .brand-mark{ width:30px; height:30px; }
.site-header .brand{ align-items:center; gap:12px; }
.site-header .brand > span:last-child{ display:flex; flex-direction:column; justify-content:center; line-height:1; }
.site-header .brand small{ margin-top:4px; line-height:1; }
.brand-mark span{ background:var(--clay); }
.brand-mark span:nth-child(3){ background:var(--slate); }
.brand-mark span:nth-child(2){ background:var(--ink); }
.brand small{ font-family:var(--font-mono); font-weight:400; font-size:0.6rem; color:var(--ink-soft); display:block; line-height:1.05; margin-top:-2px; letter-spacing:0.06em; }

.nav-links{ display:flex; align-items:center; gap:32px; }
.nav-links a{ font-size:0.92rem; font-weight:600; color:var(--ink-soft); padding:4px 2px; border-bottom:2px solid transparent; }
.nav-links a:hover, .nav-links a[aria-current="page"]{ color:var(--ink); border-color:var(--clay); }
.nav-cta{ display:flex; align-items:center; gap:18px; }
.nav-toggle{ display:none; background:none; border:none; padding:8px 10px; border-radius:var(--radius-sm); }
.nav-toggle span, .nav-toggle span::before, .nav-toggle span::after{ content:''; display:block; width:18px; height:2px; background:var(--ink); position:relative; transition:transform .18s ease, background .18s ease, top .18s ease; }
.nav-toggle span::before{ position:absolute; top:-6px; }

.nav-toggle[aria-expanded="true"] span{ background:transparent; }
.nav-toggle[aria-expanded="true"] span::before{ top:0; transform:rotate(45deg); }
.nav-toggle[aria-expanded="true"] span::after{ top:0; transform:rotate(-45deg); }

@media (max-width:860px){
  .nav-links{
    position:absolute; top:100%; left:0; right:0;
    background:var(--bg); border-bottom:var(--grout) solid var(--ink);
    flex-direction:column; align-items:flex-start; gap:0;
    padding:8px 24px 20px;
    display:none;
  }
  .nav-links.open{ display:flex; }
  .nav-links a{ width:100%; padding:12px 0; border-bottom:1px solid var(--line); }
  .nav-toggle{ display:block; }
  .nav-cta .btn{ display:none; }
}

/* =========================================================
   Hero
   ========================================================= */
.hero{
  position:relative;
  background:var(--ink);
  color:var(--bg);
  overflow:hidden;
}
.hero-inner{
  position:relative; z-index:2;
  padding-top:110px; padding-bottom:90px;
  display:grid;
  grid-template-columns:1.1fr 0.9fr;
  gap:48px;
  align-items:center;
}
.hero-eyebrow{ font-family:var(--font-mono); color:var(--clay-tint); text-transform:uppercase; font-size:0.78rem; letter-spacing:0.14em; margin-bottom:18px; }
.hero h1{ font-size:clamp(2.4rem, 5vw, 3.6rem); color:var(--bg); }
.hero h1 em{ font-style:normal; color:var(--clay-tint); }
.hero p{ color:#C9C4BB; font-size:1.05rem; max-width:46ch; }
.hero-ctas{ display:flex; gap:16px; margin-top:32px; flex-wrap:wrap; }

.hero-visual{
  position:relative;
  aspect-ratio:1;
  border-radius:12px;
  overflow:hidden;
  background:linear-gradient(160deg, #2E3A42 0%, var(--ink) 65%);
  box-shadow:0 30px 60px rgba(0,0,0,0.35);
}
.hero-visual::before{
  content:'';
  position:absolute; inset:0;
  background-image:
    repeating-linear-gradient(0deg, rgba(255,255,255,0.05) 0 1px, transparent 1px 56px),
    repeating-linear-gradient(90deg, rgba(255,255,255,0.05) 0 1px, transparent 1px 56px);
}
.hero-tile{
  position:absolute;
  border-radius:8px;
  opacity:0;
  animation:lay-tile .6s ease forwards;
  box-shadow:0 18px 32px rgba(0,0,0,0.35);
}
.hero-tile-1{ width:52%; aspect-ratio:1; background:var(--clay); top:12%; left:10%; --rot:-6deg; animation-delay:.1s; }
.hero-tile-2{ width:40%; aspect-ratio:1; background:var(--clay-tint); bottom:14%; right:8%; --rot:8deg; animation-delay:.28s; }
.hero-tile-3{ width:34%; aspect-ratio:1; background:var(--bg); top:44%; left:46%; --rot:-3deg; animation-delay:.46s; }
@keyframes lay-tile{
  from{ opacity:0; transform:translateY(24px) scale(.9) rotate(0deg); }
  to{ opacity:1; transform:translateY(0) scale(1) rotate(var(--rot,0deg)); }
}

@media (max-width:860px){
  .hero-inner{ grid-template-columns:1fr; padding-top:64px; padding-bottom:56px; }
  .hero-visual{ max-width:320px; margin:0 auto; }
}

/* =========================================================
   Sections (generic)
   ========================================================= */
section{ padding:88px 0; }
.section-tight{ padding:56px 0; }
.section-alt{ background:var(--bg-alt); }
.section-dark{ background:var(--ink); color:var(--bg); }
.section-dark p{ color:#C9C4BB; }
.section-head{ max-width:640px; margin-bottom:48px; }
.eyebrow{
  font-family:var(--font-mono); text-transform:uppercase;
  font-size:0.75rem; letter-spacing:0.14em; color:var(--clay-dark);
  display:flex; align-items:center; gap:10px; margin-bottom:14px;
}
.eyebrow::before{ content:''; width:16px; height:2px; background:var(--clay); }
.section-dark .eyebrow{ color:var(--clay-tint); }
.section-dark .eyebrow::before{ background:var(--clay-tint); }

/* =========================================================
   Trust strip
   ========================================================= */
.trust-strip{
  border-top:var(--grout) solid var(--ink); border-bottom:var(--grout) solid var(--ink);
}
.trust-grid{
  display:grid; grid-template-columns:repeat(4,1fr); gap:32px;
}
.trust-item{ padding:28px 0; }
.trust-item .icon{ width:28px; height:28px; color:var(--clay); margin-bottom:14px; display:block; }
.trust-item .icon svg{ width:100%; height:100%; display:block; }
.trust-item h4{ font-size:1rem; margin-bottom:4px; }
.trust-item p{ font-size:0.9rem; margin:0; }
@media (max-width:860px){
  .trust-grid{ grid-template-columns:1fr 1fr; gap:28px 24px; }
}

/* =========================================================
   Service cards / grid — image-led cards
   ========================================================= */
.grid-services{
  display:grid; grid-template-columns:repeat(4, 1fr); gap:24px;
}
.service-card{
  background:var(--white);
  border:1px solid var(--line);
  border-radius:10px;
  overflow:hidden;
  display:flex; flex-direction:column;
  box-shadow:0 1px 3px rgba(35,32,28,0.05);
  transition:transform .18s ease, box-shadow .18s ease;
}
.service-card:hover{ transform:translateY(-3px); box-shadow:0 12px 24px rgba(35,32,28,0.10); }
.service-image{
  position:relative;
  aspect-ratio:4/3;
  background:var(--img-grad, linear-gradient(135deg, var(--clay), var(--slate)));
}
.service-image::after{
  content:'';
  position:absolute; inset:0;
  background-image:repeating-linear-gradient(45deg, rgba(255,255,255,0.08) 0 2px, transparent 2px 28px);
}
.service-body{ padding:24px 24px 26px; display:flex; flex-direction:column; gap:12px; flex:1; }
.service-card h3{ font-size:1.08rem; }
.service-card p{ font-size:0.92rem; margin-bottom:4px; }
.service-card .card-link{ margin-top:auto; font-family:var(--font-mono); font-size:0.8rem; color:var(--clay-dark); font-weight:600; text-transform:uppercase; letter-spacing:0.04em; }
.service-card .card-link:hover{ text-decoration:underline; }

/* distinct gradient per service — reads as photography, not a grid of squares */
.svc-1{ --img-grad: linear-gradient(135deg, var(--clay) 0%, var(--slate) 100%); }
.svc-2{ --img-grad: linear-gradient(135deg, var(--slate) 0%, var(--clay-dark) 100%); }
.svc-3{ --img-grad: linear-gradient(135deg, var(--clay-tint) 0%, var(--ink) 100%); }
.svc-4{ --img-grad: linear-gradient(135deg, var(--ink) 0%, var(--clay) 100%); }
.svc-5{ --img-grad: linear-gradient(135deg, var(--clay-dark) 0%, var(--clay-tint) 100%); }
.svc-6{ --img-grad: linear-gradient(135deg, var(--slate) 0%, var(--clay-tint) 100%); }
.svc-7{ --img-grad: linear-gradient(135deg, var(--clay) 0%, var(--ink) 100%); }
.svc-8{ --img-grad: linear-gradient(135deg, var(--clay-tint) 0%, var(--slate) 100%); }
.svc-9{ --img-grad: linear-gradient(135deg, var(--ink) 0%, var(--clay-dark) 100%); }

@media (max-width:900px){
  .grid-services{ grid-template-columns:1fr 1fr; }
}
@media (max-width:560px){
  .grid-services{ grid-template-columns:1fr; }
}

.rounded-media{ border-radius:12px; overflow:hidden; }

/* =========================================================
   Homepage "Our Work" preview row
   ========================================================= */
.work-row{
  display:grid; grid-template-columns:repeat(4, 1fr); gap:20px;
}
.work-thumb{
  position:relative; display:block; aspect-ratio:4/3; border-radius:10px; overflow:hidden;
  background:var(--img-grad, linear-gradient(135deg, var(--clay), var(--slate)));
}
.work-thumb::after{
  content:'';
  position:absolute; inset:0;
  background-image:repeating-linear-gradient(45deg, rgba(255,255,255,0.08) 0 2px, transparent 2px 28px);
}
.work-thumb-label{
  position:absolute; left:12px; bottom:12px; z-index:1;
  background:rgba(23,21,18,0.72); color:var(--bg);
  font-family:var(--font-mono); font-size:0.72rem; letter-spacing:0.02em;
  padding:6px 10px; border-radius:4px;
}
.work-head{ display:flex; justify-content:space-between; align-items:flex-end; gap:24px; flex-wrap:wrap; margin-bottom:32px; }
.work-head .section-head{ margin-bottom:0; }
@media (max-width:860px){ .work-row{ grid-template-columns:1fr 1fr; } }
@media (max-width:560px){ .work-row{ grid-template-columns:1fr; } }

/* =========================================================
   CTA banner
   ========================================================= */
.cta-banner{
  background:var(--clay);
  color:var(--white);
  padding:64px 0;
}
.cta-banner-inner{
  display:flex; align-items:center; justify-content:space-between; gap:32px; flex-wrap:wrap;
}
.cta-banner h2{ color:var(--white); margin-bottom:6px; font-size:1.9rem; }
.cta-banner p{ color:rgba(255,255,255,0.85); margin:0; }

/* =========================================================
   Footer
   ========================================================= */
.site-footer{ background:var(--ink); color:#C9C4BB; padding:64px 0 28px; }
.footer-grid{ display:grid; grid-template-columns:2fr 1fr 1fr 1fr; gap:32px; padding-bottom:40px; }
.footer-grid h4{ color:var(--bg); font-size:0.85rem; text-transform:uppercase; letter-spacing:0.08em; margin-bottom:16px; }
.footer-grid ul li{ margin-bottom:10px; }
.footer-grid .contact-list li{ display:flex; align-items:center; gap:9px; }
.footer-grid .contact-list .icon-inline{ width:15px; height:15px; color:var(--clay-tint); }
.footer-grid a:hover{ color:var(--clay-tint); }
.footer-brand p{ max-width:34ch; font-size:0.9rem; }
.footer-bottom{
  display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px;
  border-top:1px solid rgba(255,255,255,0.14); padding-top:24px;
  font-size:0.82rem; color:#8B857C;
}
@media (max-width:760px){
  .footer-grid{ grid-template-columns:1fr 1fr; }
}

/* =========================================================
   Page header (interior pages)
   ========================================================= */
.page-header{ background:var(--ink); color:var(--bg); padding:64px 0 48px; }
.page-header h1{ color:var(--bg); font-size:clamp(2rem, 4vw, 2.8rem); }
.breadcrumb{ font-family:var(--font-mono); font-size:0.78rem; color:var(--clay-tint); margin-bottom:16px; text-transform:uppercase; letter-spacing:0.08em; }

/* =========================================================
   About page bits
   ========================================================= */
.value-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:var(--grout); background:var(--ink); }
.value-card{ background:var(--bg); padding:32px 28px; }
.value-card .num{ font-family:var(--font-mono); color:var(--clay); font-size:0.85rem; }
@media (max-width:860px){ .value-grid{ grid-template-columns:1fr; } }

.two-col{ display:grid; grid-template-columns:1fr 1fr; gap:56px; align-items:center; }
@media (max-width:860px){ .two-col{ grid-template-columns:1fr; gap:32px; } }
.stat-row{ display:flex; gap:40px; margin-top:28px; flex-wrap:wrap; }
.stat-row div strong{ display:block; font-family:var(--font-display); font-size:2rem; color:var(--clay); }
.stat-row div span{ font-size:0.82rem; color:var(--ink-soft); font-family:var(--font-mono); text-transform:uppercase; letter-spacing:0.05em; }

/* =========================================================
   Our Work gallery (CSS-pattern placeholders)
   ========================================================= */
.gallery-grid{ display:grid; grid-template-columns:repeat(3,1fr); gap:24px; }
@media (max-width:860px){ .gallery-grid{ grid-template-columns:1fr 1fr; } }
@media (max-width:560px){ .gallery-grid{ grid-template-columns:1fr; } }
.gallery-card{ background:var(--white); border:1px solid var(--line); overflow:hidden; }
.gallery-swatch{
  position:relative;
  aspect-ratio:4/3;
  background:var(--pattern-grad, linear-gradient(135deg, var(--clay), var(--slate)));
}
.gallery-swatch span{ display:none; }
.gallery-swatch::after{
  content:'';
  position:absolute; inset:0;
  background-image:repeating-linear-gradient(45deg, rgba(255,255,255,0.08) 0 2px, transparent 2px 28px);
}
.gallery-card .caption{ padding:18px 20px; }
.gallery-card .caption .tag{ font-family:var(--font-mono); font-size:0.72rem; color:var(--clay-dark); text-transform:uppercase; letter-spacing:0.06em; display:block; margin-bottom:4px; }
.gallery-card .caption h3{ font-size:1rem; margin-bottom:2px; }
.gallery-card .caption p{ font-size:0.85rem; margin:0; }

/* palette variants so each photo-style swatch looks distinct */
.p1{ --pattern-grad: linear-gradient(135deg, var(--clay) 0%, var(--slate) 100%); }
.p2{ --pattern-grad: linear-gradient(135deg, var(--slate) 0%, var(--clay-dark) 100%); }
.p3{ --pattern-grad: linear-gradient(135deg, var(--clay-tint) 0%, var(--ink) 100%); }
.p4{ --pattern-grad: linear-gradient(135deg, var(--clay-dark) 0%, var(--clay-tint) 100%); }
.p5{ --pattern-grad: linear-gradient(135deg, var(--slate) 0%, var(--clay) 100%); }
.p6{ --pattern-grad: linear-gradient(135deg, var(--clay) 0%, var(--clay-tint) 100%); }

/* =========================================================
   Service area page
   ========================================================= */
.suburb-list{ display:grid; grid-template-columns:repeat(3,1fr); gap:10px 24px; }
@media (max-width:760px){ .suburb-list{ grid-template-columns:1fr 1fr; } }
.suburb-list li{ font-size:0.94rem; padding:8px 0; border-bottom:1px solid var(--line); display:flex; align-items:center; gap:10px; }
.map-frame{ border:var(--grout) solid var(--ink); border-radius:var(--radius-md); overflow:hidden; height:420px; }
.map-frame iframe{ width:100%; height:100%; border:0; }

/* =========================================================
   Forms
   ========================================================= */
.field{ margin-bottom:20px; }
.photo-list{ display:flex; flex-wrap:wrap; gap:8px; margin-top:10px; color:var(--ink-soft); font-size:.85rem; }
.photo-list img{ width:58px; height:58px; object-fit:cover; border:1px solid var(--line); border-radius:4px; }
.photo-preview{ position:relative; display:block; width:58px; height:58px; }.photo-preview button{ position:absolute; top:-7px; right:-7px; width:20px; height:20px; padding:0; border:0; border-radius:50%; background:var(--ink); color:#fff; font-size:15px; line-height:20px; }
.field label{ display:block; font-size:0.85rem; font-weight:700; margin-bottom:6px; }
.field .hint{ font-size:0.78rem; color:var(--ink-soft); margin-top:6px; }
.field input, .field textarea, .field select{
  width:100%; padding:13px 14px; border:1.5px solid var(--line-strong);
  border-radius:var(--radius-sm); background:var(--white); font-family:inherit; font-size:0.95rem; color:var(--ink);
}
.field input:focus, .field textarea:focus, .field select:focus{ border-color:var(--clay); outline:none; }
.field-row{ display:grid; grid-template-columns:1fr 1fr; gap:16px; }
@media (max-width:560px){ .field-row{ grid-template-columns:1fr; } }
.contact-grid{ display:grid; grid-template-columns:1.1fr 0.9fr; gap:56px; }
@media (max-width:900px){ .contact-grid{ grid-template-columns:1fr; } }
.info-card{ background:var(--ink); color:var(--bg); padding:36px; border-radius:var(--radius-md); }
.info-card h3{ color:var(--bg); font-size:1.1rem; }
.info-card .row{ display:flex; gap:14px; padding:14px 0; border-top:1px solid rgba(255,255,255,0.14); }
.info-card .row:first-of-type{ border-top:none; }
.info-card .row .label{ font-family:var(--font-mono); font-size:0.72rem; text-transform:uppercase; letter-spacing:0.06em; color:var(--clay-tint); width:90px; flex:none; }

/* =========================================================
   Quote modal (multi-step)
   ========================================================= */
.modal-overlay{
  position:fixed; inset:0; background:rgba(35,32,28,0.7);
  display:none; align-items:center; justify-content:center; z-index:100; padding:20px;
}
.modal-overlay.open{ display:flex; }
.modal{
  background:var(--bg); width:100%; max-width:560px; border-radius:var(--radius-md);
  max-height:90vh; overflow-y:auto; position:relative;
  border-top:6px solid var(--clay);
}
.modal-head{ display:flex; align-items:center; justify-content:space-between; padding:24px 28px 0; }
.modal-close{ background:none; border:none; font-size:1.4rem; line-height:1; color:var(--ink-soft); padding:6px; }
.modal-close:hover{ color:var(--ink); }
.modal-steps{ display:flex; gap:6px; padding:16px 28px 0; }
.modal-steps span{ height:3px; flex:1; background:var(--line); }
.modal-steps span.done, .modal-steps span.active{ background:var(--clay); }
.modal-body{ padding:24px 28px 32px; }
.modal-body h3{ font-size:1.3rem; margin-bottom:6px; }
.modal-body > p{ font-size:0.92rem; margin-bottom:22px; }
.step{ display:none; }
.step.active{ display:block; }
.service-pick{ display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-bottom:8px; }
@media (max-width:480px){ .service-pick{ grid-template-columns:1fr; } }
.service-pick label{
  display:flex; align-items:center; gap:10px; border:1.5px solid var(--line-strong); border-radius:var(--radius-sm);
  padding:12px 14px; font-size:0.88rem; font-weight:600; cursor:pointer;
}
.service-pick input{ width:auto; accent-color:var(--clay); }
.service-pick label:has(input:checked){ border-color:var(--clay); background:var(--clay-tint); }
.brand-select, #quote-commercial-type, #quote-tile-size{ appearance:none; cursor:pointer; padding-right:42px !important; background-color:var(--white) !important; background-image:linear-gradient(45deg, transparent 50%, var(--clay) 50%),linear-gradient(135deg, var(--clay) 50%, transparent 50%); background-position:calc(100% - 19px) 50%,calc(100% - 13px) 50%; background-size:6px 6px,6px 6px; background-repeat:no-repeat; }
.brand-select:hover{ border-color:var(--clay); }
.brand-check, label:has(#quote-materials){ display:flex !important; align-items:center; gap:10px; min-height:48px; padding:12px 14px; border:1.5px solid var(--line-strong); border-radius:var(--radius-sm); background:var(--white); cursor:pointer; transition:background .2s,border-color .2s; }
.brand-check input, #quote-materials{ appearance:none; width:18px !important; height:18px; flex:none; margin:0; padding:0 !important; border:1.5px solid var(--line-strong); border-radius:50%; background:var(--white); position:relative; }
.brand-check input:checked, #quote-materials:checked{ border-color:var(--clay); background:var(--clay); box-shadow:inset 0 0 0 4px var(--white); }
.brand-check:has(input:checked), label:has(#quote-materials:checked){ border-color:var(--clay); background:var(--clay-tint); }
.brand-select-custom{ position:relative; }
.brand-select-native{ position:absolute !important; width:1px !important; height:1px !important; opacity:0 !important; pointer-events:none; }
.brand-select-button{ width:100%; padding:13px 42px 13px 14px; border:1.5px solid var(--line-strong); border-radius:var(--radius-sm); background:var(--white); color:var(--ink); font:inherit; text-align:left; cursor:pointer; position:relative; }
.brand-select-button::after{ content:''; position:absolute; right:16px; top:50%; width:8px; height:8px; border-right:2px solid var(--clay); border-bottom:2px solid var(--clay); transform:translateY(-65%) rotate(45deg); }
.brand-select-custom.open .brand-select-button, .brand-select-button:focus{ border-color:var(--clay); outline:none; box-shadow:0 0 0 3px rgba(184,92,56,.14); }
.brand-select-custom.open .brand-select-button::after{ transform:translateY(-25%) rotate(225deg); }
.brand-select-options{ display:none; position:absolute; z-index:20; inset:calc(100% + 6px) 0 auto; padding:6px; border:1.5px solid var(--clay); border-radius:var(--radius-sm); background:var(--white); box-shadow:0 12px 28px rgba(35,32,28,.14); }
.brand-select-custom.open .brand-select-options{ display:grid; gap:3px; }
.brand-select-option{ padding:11px 12px; border:0; border-radius:6px; background:transparent; color:var(--ink); font:inherit; text-align:left; cursor:pointer; }
.brand-select-option:hover, .brand-select-option.active{ background:var(--clay-tint); color:var(--clay-dark); }
.modal-actions{ display:flex; justify-content:space-between; gap:12px; margin-top:24px; }
.modal-actions .btn{ padding:12px 22px; }
.step-summary{ background:var(--white); border:1px solid var(--line); border-radius:var(--radius-sm); padding:16px; font-size:0.85rem; margin-bottom:20px; }
.step-summary div{ display:flex; justify-content:space-between; padding:6px 0; border-bottom:1px solid var(--line); }
.step-summary div:last-child{ border-bottom:none; }
.confirm-icon{ width:52px; height:52px; background:var(--clay); color:var(--white); display:flex; align-items:center; justify-content:center; font-family:var(--font-display); font-size:1.6rem; border-radius:50%; margin-bottom:18px; }

/* =========================================================
   Utility
   ========================================================= */
.text-center{ text-align:center; margin-left:auto; margin-right:auto; }
.mt-32{ margin-top:32px; }
.sr-only{
  position:absolute; width:1px; height:1px; padding:0; margin:-1px;
  overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0;
}

</style>
</head>
<body>
<a class="sr-only" href="#main">Skip to content</a>
@include('site.partials.header')
@if(false)
<header class="site-header">
  <div class="container nav">
    <a href="/" class="brand" aria-label="Ozghan.au home">
      <img class="brand-mark brand-logo" src="/logo.png" alt="">
      <span>Ozghan<small>TILING BRISBANE</small></span>
    </a>
    <nav class="nav-links" aria-label="Primary">
      <a href="/" data-nav="home">Home</a>
      <a href="/about" data-nav="about" aria-current="page">About</a>
      <a href="/services" data-nav="services">Services</a>
      <a href="/our-work" data-nav="work">Our Work</a>
      <a href="/service-area" data-nav="area">Service Area</a>
      <a href="/contact" data-nav="contact">Contact</a>
    </nav>
    <div class="nav-cta">
      <button class="btn btn-primary" data-open-quote>Get a Quote</button>
      <button class="nav-toggle" aria-label="Toggle menu" aria-expanded="false"><span></span></button>
    </div>
  </div>
</header>
@endif

<main id="main">
<header class="page-header">
  <div class="container">
    <div class="breadcrumb">About Ozghan</div>
    <h1>A Brisbane tiling crew that stands behind its grout lines</h1>
  </div>
</header>

<section>
  <div class="container two-col">
    <div>
      <div class="eyebrow">Our story</div>
      <h2>Tiling done properly, from prep to polish</h2>
      <p>Ozghan was started in Brisbane to do one thing well: tile jobs that are prepped, waterproofed and set correctly the first time. No shortcuts on the membrane, no rushed grout lines, no gaps between what was quoted and what was delivered.</p>
      <p>We work directly with homeowners, renovators and builders across Brisbane — from a single ensuite to a full commercial fit-out — and we're on site for the job ourselves, not managing it from a distance.</p>
      <div class="stat-row">
        <div><strong>250+</strong><span>Jobs completed</span></div>
        <div><strong>100%</strong><span>Waterproofing certified</span></div>
        <div><strong>Brisbane</strong><span>Based &amp; local</span></div>
      </div>
    </div>
    <div class="service-image svc-5 rounded-media" aria-hidden="true" style="aspect-ratio:4/3;"></div>
  </div>
</section>

<section class="section-alt">
  <div class="container">
    <div class="section-head">
      <div class="eyebrow">How we work</div>
      <h2>Three things every job gets</h2>
    </div>
    <div class="value-grid">
      <div class="value-card">
        <span class="icon-badge" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3.5"/><path d="M12 3v2.5M12 18.5V21M3 12h2.5M18.5 12H21"/></svg></span>
        <h3>Precision</h3>
        <p>Level substrates, consistent falls and grout lines checked before anything is fixed permanently.</p>
      </div>
      <div class="value-card">
        <span class="icon-badge" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/></svg></span>
        <h3>Reliability</h3>
        <p>A confirmed start date and a confirmed finish date — communicated if anything changes, before it becomes a surprise.</p>
      </div>
      <div class="value-card">
        <span class="icon-badge" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 3.5l6 6-8.5 8.5-6.5 1.5 1.5-6.5 7.5-9.5z"/><path d="M13 6l5 5"/></svg></span>
        <h3>Craftsmanship</h3>
        <p>Pattern-matched cuts, clean edges and a finish that still looks right up close, years later.</p>
      </div>
    </div>
  </div>
</section>

<section class="cta-banner">
  <div class="container cta-banner-inner">
    <div>
      <h2>Have a job in mind?</h2>
      <p>Get a free on-site quote — no obligation.</p>
    </div>
    <button class="btn btn-block" style="background:var(--ink); color:var(--white); width:auto;" data-open-quote>Get a Quote</button>
  </div>
</section>

</main>
@include('site.partials.footer')
@if(false)
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <div class="brand" style="color:var(--bg); margin-bottom:14px;">
          <img class="brand-mark brand-logo" src="/logo.png" alt="">
          <span>Ozghan</span>
        </div>
        <p>Brisbane tiling for bathrooms, kitchens, floors and commercial fit-outs — laid level, laid true.</p>
      </div>
      <div>
        <h4>Site</h4>
        <ul>
          <li><a href="/about">About</a></li>
          <li><a href="/services">Services</a></li>
          <li><a href="/our-work">Our Work</a></li>
          <li><a href="/service-area">Service Area</a></li>
        </ul>
      </div>
      <div>
        <h4>Services</h4>
        <ul>
          <li><a href="/services#bathroom-tiling">Bathroom Tiling</a></li>
          <li><a href="/services#floor-tiling">Floor Tiling</a></li>
          <li><a href="/services#waterproofing">Waterproofing</a></li>
          <li><a href="/services#commercial-tiling">Commercial Tiling</a></li>
        </ul>
      </div>
      <div>
        <h4>Contact</h4>
        <ul class="contact-list">
          <li><span class="icon-inline"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 5c0 8.3 6.7 15 15 15l1-4-5-2-1.5 1.5A11 11 0 0 1 7.5 9.5L9 8 7 3 4 5z"/></svg></span><a href="tel:+61700000000">(07) 0000 0000</a></li>
          <li><span class="icon-inline"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3.5" y="5" width="17" height="14" rx="1.5"/><path d="M4.5 6.5l7.5 6 7.5-6"/></svg></span><a href="mailto:contact@ozghan.au">contact@ozghan.au</a></li>
          <li><span class="icon-inline"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-6.5 7-11.5A7 7 0 0 0 5 9.5C5 14.5 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.3"/></svg></span>Brisbane, QLD</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <span data-year></span> Ozghan.au — All rights reserved.</span>
      <span>ABN 00 000 000 000 &middot; Licensed &amp; insured</span>
    </div>
  </div>
</footer>
@endif

<div class="modal-overlay" id="quote-modal">
  <div class="modal" role="dialog" aria-modal="true" aria-labelledby="quote-modal-title" tabindex="-1">
    <div class="modal-head">
      <span id="quote-modal-title" class="eyebrow" style="margin:0;">Request a Quote</span>
      <button class="modal-close" aria-label="Close">&times;</button>
    </div>
    <div class="modal-steps" aria-hidden="true">
      <span class="active"></span><span></span><span></span><span></span><span></span><span></span>
    </div>
    <div class="modal-body">
      <form id="quote-form" novalidate>
        <div id="quote-form-steps">

          <div class="step active" data-step="project">
            <h3>Tell us about your project</h3><p>Choose the project type and where the tiling will be done.</p>
            <div class="field"><strong>Project type</strong><div class="service-pick"><label><input type="radio" name="project_type" value="Residential" required> Residential</label><label><input type="radio" name="project_type" value="Commercial"> Commercial</label></div></div>
            <div class="field"><strong>Location</strong><div class="service-pick"><label><input type="radio" name="project_location" value="Indoor" required> Indoor</label><label><input type="radio" name="project_location" value="Outdoor"> Outdoor</label></div></div>
            <div class="field" id="quote-commercial-field" hidden><label for="quote-commercial-type">Commercial property type</label><select id="quote-commercial-type" name="commercial_type"><option value="">Select property type</option><option value="Airport">Airport</option><option value="Shopping mall">Shopping mall</option><option value="Hotel">Hotel</option><option value="Train station">Train station</option></select></div>
            <div class="modal-actions"><span></span><button type="button" class="btn btn-primary" data-next>Next</button></div>
          </div>
          <div class="step" data-step="service">
            <h3>What do you need tiled?</h3>
            <p>Pick the service closest to your job — we'll confirm the details on site.</p>
            <div class="service-pick">
              <label data-location="indoor"><input type="radio" name="service" value="Bathroom Tiling" required> Bathroom Tiling</label>
              <label data-location="indoor"><input type="radio" name="service" value="Kitchen Tiling"> Kitchen Tiling</label>
              <label data-location="indoor"><input type="radio" name="service" value="Indoor Floor Tiling"> Indoor Floor Tiling</label>
              <label data-location="indoor"><input type="radio" name="service" value="Indoor Wall Tiling"> Indoor Wall Tiling</label>
              <label data-location="indoor"><input type="radio" name="service" value="Waterproofing"> Waterproofing</label>
              <label data-location="indoor"><input type="radio" name="service" value="Indoor Renovation Tiling"> Indoor Renovation Tiling</label>
              <label data-location="outdoor"><input type="radio" name="service" value="Patio &amp; Alfresco Tiling"> Patio &amp; Alfresco Tiling</label>
              <label data-location="outdoor"><input type="radio" name="service" value="Pool Surround Tiling"> Pool Surround Tiling</label>
              <label data-location="outdoor"><input type="radio" name="service" value="Outdoor Floor Tiling"> Outdoor Floor Tiling</label>
              <label data-location="outdoor"><input type="radio" name="service" value="Outdoor Wall Tiling"> Outdoor Wall Tiling</label>
              <label data-location="outdoor"><input type="radio" name="service" value="Driveway &amp; Path Tiling"> Driveway &amp; Path Tiling</label>
              <label data-location="outdoor"><input type="radio" name="service" value="Outdoor Renovation Tiling"> Outdoor Renovation Tiling</label>
            </div>
            <div class="modal-actions">
              <button type="button" class="btn btn-outline" data-back>Back</button>
              <button type="button" class="btn btn-primary" data-next>Next</button>
            </div>
          </div>

          <div class="step" data-step="address">
            <h3>Where's the job?</h3>
            <p>Give us the property address so we can quote travel and scope correctly.</p>
            <div class="field">
              <label for="quote-address">Property address</label>
              <input type="text" id="quote-address" name="address" placeholder="Street, suburb, postcode" required>
            </div>
            <div class="field"><label for="quote-date">Preferred date</label><input type="date" id="quote-date" name="date" required></div>
            <div class="modal-actions">
              <button type="button" class="btn btn-outline" data-back>Back</button>
              <button type="button" class="btn btn-primary" data-next>Next</button>
            </div>
          </div>

          <div class="step" data-step="details">
            <h3>Tell us about the job</h3><p>These details help us prepare a more accurate quote.</p>
            <div class="field"><label for="quote-area">Estimated tile area (m²)</label><input type="number" id="quote-area" name="area" min="0" step="0.01" placeholder="e.g. 24.5"><div class="hint">An estimate is fine if you do not know the exact measurement.</div></div>
            <div class="field"><label><input type="checkbox" id="quote-materials" name="materials"> I provide tiling materials</label></div>
            <div class="field" id="quote-tile-size-field" hidden><label for="quote-tile-size">What size are the tiles?</label><select id="quote-tile-size" name="tile_size"><option value="">Select tile size</option><option value="Small">Small</option><option value="Medium">Medium</option><option value="Big">Big</option></select></div>
            <div class="field"><label for="quote-photos">Photos of the area <span class="hint">(optional)</span></label><input type="file" id="quote-photos" name="photos[]" accept="image/*" multiple><div class="hint">Select or take up to 5 photos. You can choose multiple images at once.</div><div class="photo-list" id="quote-photo-list" aria-live="polite"></div></div>
            <div class="modal-actions"><button type="button" class="btn btn-outline" data-back>Back</button><button type="button" class="btn btn-primary" data-next>Next</button></div>
          </div>
          <div class="step" data-step="contact">
            <h3>How should we reach you?</h3>
            <p>We'll send your quote and call to confirm scope.</p>
            <div class="field"><label for="quote-name">Name</label><input type="text" id="quote-name" name="name" placeholder="Your full name" required></div>
            <div class="field">
              <label for="quote-email">Email</label>
              <input type="email" id="quote-email" name="email" placeholder="you@example.com" required>
            </div>
            <div class="field">
              <label for="quote-phone">Phone</label>
              <input type="tel" id="quote-phone" name="phone" placeholder="04xx xxx xxx" inputmode="tel" pattern="^(?:04[0-9]{2}(?:[ ]?[0-9]{3}){2}|[+]61[ ]?4[0-9]{2}(?:[ ]?[0-9]{3}){2})$" title="Enter a valid Australian mobile number, e.g. 04xx xxx xxx or +61 4xx xxx xxx." required>
            </div>
            <div class="field"><label for="quote-note">Anything else we should know?</label><textarea id="quote-note" name="note" rows="3" maxlength="2000" placeholder="Tell us about the job, tile type, access, or anything else..."></textarea></div>
            <div class="modal-actions">
              <button type="button" class="btn btn-outline" data-back>Back</button>
              <button type="button" class="btn btn-primary" data-next>Review</button>
            </div>
          </div>

          <div class="step" data-step="review">
            <h3>Confirm your request</h3>
            <p>Check the details below, then send it through.</p>
            <div class="step-summary" id="quote-summary"></div>
            <div class="modal-actions">
              <button type="button" class="btn btn-outline" data-back>Back</button>
              <button type="submit" class="btn btn-primary">Send Request</button>
            </div>
          </div>

        </div>

        <div id="quote-confirmation" style="display:none;">
          <div class="confirm-icon">&#10003;</div>
          <h3>Request sent</h3>
          <p>Thanks — we've got your details and will be in touch shortly to confirm your quote.</p>
          <button type="button" class="btn btn-outline btn-block modal-close-secondary">Close</button>
        </div>

      </form>
    </div>
  </div>
</div>

<script>
// =========================================================
// Ozghan.au — shared behaviour
// =========================================================

document.addEventListener('DOMContentLoaded', () => {

  /* ---------- Mobile nav toggle ---------- */
  const navToggle = document.querySelector('.nav-toggle');
  const navLinks = document.querySelector('.nav-links');
  if (navToggle && navLinks) {
    navToggle.addEventListener('click', () => {
      const isOpen = navLinks.classList.toggle('open');
      navToggle.setAttribute('aria-expanded', String(isOpen));
    });
    navLinks.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => navLinks.classList.remove('open'));
    });
  }

  /* ---------- Footer year ---------- */
  document.querySelectorAll('[data-year]').forEach(el => {
    el.textContent = new Date().getFullYear();
  });

  initQuoteModal();
  initContactForm();
});

/* =========================================================
   Quote / booking modal — 4 step flow:
   1. service  2. address  3. date  4. email + phone -> confirm
   ========================================================= */
function initQuoteModal() {
  const overlay = document.getElementById('quote-modal');
  if (!overlay) return;
  setupDynamicQuoteOptions();
  setupBrandSelects();

  function setupDynamicQuoteOptions() {
    const selectOptions = {
      'quote-commercial-type': @json(($quoteOptions['commercial_property_type'] ?? [])),
      'quote-tile-size': @json(($quoteOptions['tile_size'] ?? [])),
    };
    overlay.querySelectorAll('#quote-commercial-type, #quote-tile-size').forEach(select => {
      const placeholder = select.id === 'quote-commercial-type' ? 'Select property type' : 'Select tile size';
      select.innerHTML = '<option value="">' + placeholder + '</option>';
      (selectOptions[select.id] || []).forEach(option => {
        const item = document.createElement('option');
        item.value = option.value;
        item.textContent = option.label;
        select.appendChild(item);
      });
    });

    const services = @json($quoteServices ?? []);
    const servicePick = overlay.querySelector('.step[data-step="service"] .service-pick');
    if (servicePick && services.length) {
      servicePick.innerHTML = '';
      services.forEach((service, index) => {
        const label = document.createElement('label');
        label.dataset.location = service.category || 'indoor';
        const input = document.createElement('input');
        input.type = 'radio'; input.name = 'service'; input.value = service.title; input.required = index === 0;
        label.append(input, document.createTextNode(' ' + service.title));
        servicePick.appendChild(label);
      });
    }
  }

  function setupBrandSelects() {
    overlay.querySelectorAll('#quote-commercial-type, #quote-tile-size').forEach(select => {
      const wrapper = document.createElement('div');
      wrapper.className = 'brand-select-custom';
      select.parentNode.insertBefore(wrapper, select);
      wrapper.appendChild(select);
      select.classList.add('brand-select-native');

      const button = document.createElement('button');
      button.type = 'button';
      button.className = 'brand-select-button';
      button.setAttribute('aria-haspopup', 'listbox');
      button.setAttribute('aria-expanded', 'false');

      const options = document.createElement('div');
      options.className = 'brand-select-options';
      options.setAttribute('role', 'listbox');

      Array.from(select.options).forEach(option => {
        const item = document.createElement('button');
        item.type = 'button';
        item.className = 'brand-select-option';
        item.textContent = option.textContent;
        item.dataset.value = option.value;
        item.setAttribute('role', 'option');
        item.addEventListener('click', () => {
          select.value = option.value;
          select.dispatchEvent(new Event('change', { bubbles: true }));
          sync();
          close();
        });
        options.appendChild(item);
      });

      wrapper.append(button, options);

      function sync() {
        const selected = select.options[select.selectedIndex];
        button.textContent = selected ? selected.textContent : '';
        options.querySelectorAll('.brand-select-option').forEach(item => {
          item.classList.toggle('active', item.dataset.value === select.value);
          item.setAttribute('aria-selected', String(item.dataset.value === select.value));
        });
      }
      function close() {
        wrapper.classList.remove('open');
        button.setAttribute('aria-expanded', 'false');
      }
      button.addEventListener('click', () => {
        const isOpen = wrapper.classList.toggle('open');
        button.setAttribute('aria-expanded', String(isOpen));
      });
      document.addEventListener('click', event => {
        if (!wrapper.contains(event.target)) close();
      });
      select.addEventListener('change', sync);
      sync();
    });
  }


  const openers = document.querySelectorAll('[data-open-quote]');
  const closeBtn = overlay.querySelector('.modal-close');
  const steps = Array.from(overlay.querySelectorAll('.step'));
  const dots = Array.from(overlay.querySelectorAll('.modal-steps span'));
  const form = overlay.querySelector('#quote-form');
  const photoInput = overlay.querySelector('#quote-photos');
  if (photoInput) photoInput.addEventListener('change', async () => {
    let files = Array.from(photoInput.files || []); const remaining = 5 - state.photoUploads.length;
    if (remaining <= 0) { photoInput.value = ''; return; } if (files.length > remaining) files = files.slice(0, remaining);
    const upload = new FormData(); files.forEach(file => upload.append('photos[]', file)); const list = photoInput.closest('.field').querySelector('.photo-list'); list.textContent = 'Uploading photos…';
    try { const response = await fetch('/orders/photos', { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' }, body: upload }); if (!response.ok) throw new Error(); const result = await response.json(); state.photoUploads.push(...result.photos); state.photos = state.photoUploads.map(photo => photo.name); list.innerHTML = state.photoUploads.map(photo => '<span class="photo-preview"><img src="' + photo.url + '" alt="' + photo.name.replace(/"/g, '&quot;') + '"><button type="button" data-photo-path="' + photo.path + '" aria-label="Remove photo">×</button></span>').join(''); list.querySelectorAll('[data-photo-path]').forEach(button => button.addEventListener('click', async () => { const remove = new FormData(); remove.append('path', button.dataset.photoPath); const response = await fetch('/orders/photos/remove', { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' }, body: remove }); if (response.ok) { state.photoUploads = state.photoUploads.filter(photo => photo.path !== button.dataset.photoPath); state.photos = state.photoUploads.map(photo => photo.name); button.closest('.photo-preview').remove(); } })); photoInput.value = ''; } catch (error) { list.textContent = 'Photo upload failed. Please try again.'; }
  });

  const state = { projectType: '', projectLocation: '', commercialType: '', service: '', address: '', date: '', name: '', email: '', phone: '', area: '', note: '', photos: [], photoUploads: [], materials: false, tileSize: '' };
  const commercialField = overlay.querySelector('#quote-commercial-field');
  const commercialInput = overlay.querySelector('#quote-commercial-type');
  overlay.querySelectorAll('input[name="project_type"]').forEach(input => input.addEventListener('change', () => { const isCommercial = input.value === 'Commercial' && input.checked; commercialField.hidden = !isCommercial; commercialInput.required = isCommercial; if (!isCommercial) commercialInput.value = ''; }));
  const materialsCheckbox = overlay.querySelector('#quote-materials');
  const tileSizeField = overlay.querySelector('#quote-tile-size-field');
  const tileSizeInput = overlay.querySelector('#quote-tile-size');
  if (materialsCheckbox) materialsCheckbox.addEventListener('change', () => { tileSizeField.hidden = !materialsCheckbox.checked; tileSizeInput.required = materialsCheckbox.checked; if (!materialsCheckbox.checked) tileSizeInput.value = ''; });
  let current = 0;

  function filterServiceOptions(location) {
    overlay.querySelectorAll('.service-pick label[data-location]').forEach(label => {
      const visible = !location || label.dataset.location === location.toLowerCase();
      label.hidden = !visible;
      label.style.display = visible ? '' : 'none';
      if (!visible) { const input = label.querySelector('input'); if (input) input.checked = false; }
    });
  }

  function render() {
    filterServiceOptions(state.projectLocation);
    steps.forEach((s, i) => s.classList.toggle('active', i === current));
    dots.forEach((d, i) => {
      d.classList.toggle('active', i === current);
      d.classList.toggle('done', i < current);
    });
    if (current === steps.length - 1) buildSummary();
  }

  function buildSummary() {
    const summaryEl = overlay.querySelector('#quote-summary');
    if (!summaryEl) return;
    summaryEl.innerHTML = `
      <div><span>Service</span><strong>${state.service || '—'}</strong></div>
      <div><span>Project</span><strong>${state.projectType || '—'}${state.projectLocation ? ` — ${state.projectLocation}` : ''}</strong></div>
      <div><span>Commercial property</span><strong>${state.commercialType || '—'}</strong></div>
      <div><span>Address</span><strong>${state.address || '—'}</strong></div>
      <div><span>Preferred date</span><strong>${state.date || '—'}</strong></div>
      <div><span>Email</span><strong>${state.email || '—'}</strong></div>
      <div><span>Phone</span><strong>${state.phone || '—'}</strong></div>
      <div><span>Estimated area</span><strong>${state.area ? `${state.area} m²` : '—'}</strong></div>
      <div><span>Note</span><strong>${state.note || '—'}</strong></div>
      <div><span>Photos</span><strong>${state.photos.length ? `${state.photos.length} attached` : 'None attached'}</strong></div>
      <div><span>Materials provided</span><strong>${state.materials ? `Yes${state.tileSize ? ` — ${state.tileSize}` : ''}` : 'No'}</strong></div>
    `;
  }

  function open(preselectService) {
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    current = 0;
    render();
    if (preselectService) {
      const radio = overlay.querySelector(`input[name="service"][value="${CSS.escape(preselectService)}"]`);
      if (radio) { radio.checked = true; state.service = preselectService; }
    }
    overlay.querySelector('.modal').focus();
  }

  function close() {
    overlay.classList.remove('open');
    document.body.style.overflow = '';
    setTimeout(() => {
      form.reset();
      overlay.querySelector('#quote-form-steps').style.display = '';
      overlay.querySelector('#quote-confirmation').style.display = 'none';
      current = 0;
      render();
    }, 200);
  }

  openers.forEach(btn => {
    btn.addEventListener('click', () => { window.location.href = '/quote'; });
  });
  closeBtn.addEventListener('click', close);
  const closeSecondary = overlay.querySelector('.modal-close-secondary');
  if (closeSecondary) closeSecondary.addEventListener('click', close);
  overlay.addEventListener('click', (e) => { if (e.target === overlay) close(); });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && overlay.classList.contains('open')) close();
  });

  overlay.querySelectorAll('[data-next]').forEach(btn => {
    btn.addEventListener('click', () => {
      if (!validateStep(current)) return;
      current = Math.min(current + 1, steps.length - 1);
      render();
    });
  });
  overlay.querySelectorAll('[data-back]').forEach(btn => {
    btn.addEventListener('click', () => {
      current = Math.max(current - 1, 0);
      render();
    });
  });

  function validateStep(index) {
    const activeStep = steps[index];
    const requiredInputs = activeStep.querySelectorAll('input[required], select[required]');
    let valid = true;

    if (activeStep.dataset.step === 'project') {
      const projectType = activeStep.querySelector('input[name="project_type"]:checked');
      const projectLocation = activeStep.querySelector('input[name="project_location"]:checked');
      const commercial = projectType && projectType.value === 'Commercial';
      if (!projectType || !projectLocation || (commercial && !commercialInput.value)) { valid = false; if (commercial) commercialInput.reportValidity(); else flash(activeStep); }
      if (valid) { state.projectType = projectType.value; state.projectLocation = projectLocation.value; state.commercialType = commercial ? commercialInput.value : ''; }
    } else if (activeStep.dataset.step === 'service') {
      const checked = activeStep.querySelector('input[name="service"]:checked');
      if (!checked) { valid = false; flash(activeStep); }
      else state.service = checked.value;
    } else {
      requiredInputs.forEach(input => {
        if (!input.checkValidity()) { valid = false; input.reportValidity(); }
      });
      if (valid) {
        if (activeStep.dataset.step === 'address') { state.address = activeStep.querySelector('#quote-address').value; state.date = activeStep.querySelector('#quote-date').value; }
        if (activeStep.dataset.step === 'details') {
          state.area = activeStep.querySelector('#quote-area').value;
          state.materials = activeStep.querySelector('#quote-materials').checked;
          state.tileSize = state.materials ? activeStep.querySelector('#quote-tile-size').value : '';
          state.photos = state.photoUploads.map(photo => photo.name);
          activeStep.querySelector('#quote-photo-list').setAttribute('aria-label', state.photos.length ? state.photos.join(', ') : 'No photos attached');
        }
        if (activeStep.dataset.step === 'contact') {
          state.name = activeStep.querySelector('#quote-name').value;
          state.email = activeStep.querySelector('#quote-email').value;
          state.phone = activeStep.querySelector('#quote-phone').value;
          state.note = activeStep.querySelector('#quote-note').value.trim();
        }
      }
    }
    return valid;
  }

  function flash(el) {
    el.style.outline = '2px solid var(--clay)';
    setTimeout(() => { el.style.outline = ''; }, 900);
  }

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (!validateStep(current)) return;
    const payload = new FormData(form);
    payload.set('project_type', state.projectType || '');
    payload.set('project_location', state.projectLocation || '');
    payload.set('commercial_type', state.commercialType || '');
    payload.set('service', state.service || '');
    payload.set('address', state.address || '');
    payload.set('date', overlay.querySelector('#quote-date').dataset.dateValue || overlay.querySelector('#quote-date').value || '');
    payload.set('area', state.area || '');
    payload.set('tile_size', state.tileSize || '');
    payload.set('materials', state.materials ? '1' : '0');
    payload.set('note', state.note || '');
    state.photoUploads.forEach(photo => payload.append('uploaded_photos[]', photo.path));
    fetch('/orders', { method: 'POST', headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' }, body: payload })
      .then(response => { if (!response.ok) throw new Error('Unable to submit request'); return response.json(); })
      .then(() => { current = steps.length - 1; overlay.querySelector('#quote-form-steps').style.display = 'none'; overlay.querySelector('#quote-confirmation').style.display = 'block'; })
      .catch(() => alert('We could not send your request. Please check your details and try again.'));
  });
}

/* =========================================================
   Contact page form (client-side only demo)
   ========================================================= */
function initContactForm() {
  const form = document.getElementById('contact-form');
  if (!form) return;
  const confirmation = document.getElementById('contact-confirmation');

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }
    // NOTE for integration: send this to a real endpoint or emailing service.
    form.style.display = 'none';
    if (confirmation) confirmation.style.display = 'block';
  });
}

</script>
</body>
</html>
