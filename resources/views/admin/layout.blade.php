<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Ozghan Admin' }}</title>
    <style>
        :root{--ink:#23201c;--clay:#4091C5;--bg:#f2efea;--line:#d8d0c6}
        *{box-sizing:border-box}
        body{margin:0;background:var(--bg);color:var(--ink);font:15px/1.5 Arial,sans-serif;overflow-x:hidden}
        a{color:inherit;text-decoration:none}
        .admin-sidebar{position:fixed;inset:0 auto 0 0;width:240px;background:var(--ink);color:#fff;padding:24px 16px;display:flex;flex-direction:column;z-index:10}
        .admin-menu-toggle,.admin-menu-backdrop,.admin-menu-close{display:none}
        .admin-brand{font-size:21px;font-weight:bold;padding:0 12px 26px;border-bottom:1px solid rgba(255,255,255,.16);margin-bottom:18px}
        .admin-brand small{display:block;color:#c9c4bb;font-size:11px;letter-spacing:.08em;margin-top:3px}
        .admin-menu{display:grid;gap:4px}
        .admin-menu a{padding:11px 12px;border-radius:4px;color:#eee}
        .admin-menu a:hover,.admin-menu a.active{background:var(--clay);color:#fff}
        .admin-logout{margin-top:auto;padding:0 12px}
        .admin-shell{max-width:1200px;margin:0 auto;padding:40px 32px 40px 272px}
        .admin-footer{max-width:1200px;margin:0 auto;padding:0 32px 24px 272px;display:flex;justify-content:space-between;gap:16px;color:#706960;font-size:13px}
        .admin-footer a{text-decoration:underline;text-underline-offset:3px}
        .admin-footer nav{display:flex;gap:16px}
        .admin-card{background:#fff;border:1px solid var(--line);border-radius:5px;padding:22px;margin-bottom:20px}
        .work-admin-image{width:84px;height:60px;object-fit:cover;background:#eee;vertical-align:middle;margin-right:12px;display:inline-block}
        .work-admin-details{display:flex;align-items:center;gap:12px}.work-admin-details img{flex:none}.work-admin-details small{display:block;color:#706960;margin-top:3px}
        .admin-pagination{margin-top:18px;display:flex;justify-content:center}.admin-pagination nav{display:flex;gap:5px}.admin-pagination a,.admin-pagination span{display:inline-flex;align-items:center;justify-content:center;min-width:34px;height:34px;padding:0 9px;border:1px solid var(--line);background:#fff;color:var(--ink);font-size:13px}.admin-pagination a:hover{background:#eee}.admin-pagination span[aria-current="page"]{background:var(--ink);color:#fff}.admin-pagination svg{width:16px;height:16px}
        .admin-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:16px}
        .admin-stat{font-size:28px;font-weight:bold}
        .order-chart-card{overflow:hidden}.chart-heading{display:flex;justify-content:space-between;align-items:flex-start;gap:18px}.chart-heading h2{margin:0 0 3px}.chart-heading p{margin:0;color:#706960}.chart-wrap{margin:18px -8px -8px;overflow:hidden}.chart-wrap svg{display:block;width:100%;height:auto;min-width:520px}.chart-wrap text{font-family:Arial,sans-serif}
        .btn{display:inline-block;border:0;border-radius:3px;background:var(--clay);color:#fff;padding:10px 16px;font-weight:bold;cursor:pointer;white-space:nowrap}
        .btn-muted{background:#eee;color:var(--ink)}.danger{background:#a32f2f}
        .actions{display:flex;gap:8px;align-items:center}.table{width:100%;border-collapse:collapse}
        .table th,.table td{text-align:left;padding:11px 8px;border-bottom:1px solid var(--line);vertical-align:top}
        .field{margin-bottom:16px}.field label{display:block;font-weight:bold;margin-bottom:5px}
        .field input,.field textarea,.field select{width:100%;padding:10px;border:1px solid #bbb;border-radius:3px;font:inherit}
        .check{display:flex!important;gap:8px;align-items:center}.check input{width:auto}
        .alert{padding:10px;background:#e1f2e3;margin-bottom:18px}.error{color:#a32f2f;font-size:13px}
        @media(max-width:720px){
            .admin-menu-toggle{display:flex;position:fixed;top:12px;left:12px;width:44px;height:44px;align-items:center;justify-content:center;border:0;border-radius:4px;background:transparent;color:var(--ink);z-index:50;cursor:pointer}
            .admin-menu-toggle[aria-expanded="true"]{background:transparent;color:var(--ink)}
            .hamburger-icon,.hamburger-icon::before,.hamburger-icon::after{display:block;width:22px;height:2px;background:currentColor;position:relative}
            .hamburger-icon::before,.hamburger-icon::after{content:'';position:absolute;left:0}
            .hamburger-icon::before{top:-6px}.hamburger-icon::after{top:6px}
            .admin-menu-backdrop{display:block;position:fixed;inset:0;background:rgba(35,32,28,.55);opacity:0;pointer-events:none;transition:opacity .2s ease;z-index:35}
            .admin-sidebar{position:fixed;inset:0 auto 0 0;width:min(280px,86vw);padding:20px 16px;transform:translateX(-105%);transition:transform .2s ease;z-index:40;overflow-y:auto}
            .admin-menu-close{display:block;position:absolute;top:16px;right:14px;border:0;background:transparent;color:#fff;font-size:28px;line-height:1;cursor:pointer;padding:2px 6px}
            body.admin-menu-open{overflow:hidden}.admin-menu-open .admin-sidebar{transform:translateX(0)}.admin-menu-open .admin-menu-backdrop{opacity:1;pointer-events:auto}
            .admin-brand{padding:0 8px 18px;margin-bottom:18px;font-size:19px}
            .admin-menu{display:grid;gap:4px}.admin-menu a{padding:11px 12px;font-size:14px}
            .admin-logout{padding:12px 0 0}.admin-logout .btn{width:100%}
            .admin-shell{width:100%;padding:70px 12px 22px}
            .admin-footer{width:100%;padding:0 12px 18px;align-items:flex-start;flex-direction:column}
            .admin-shell h1{font-size:25px;line-height:1.15}
            .admin-card{padding:16px;margin-bottom:14px;overflow-x:auto}
            .admin-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}
            .admin-grid .admin-card{overflow:hidden;padding:14px 12px}.admin-stat{font-size:24px}
            .actions{flex-wrap:wrap}.actions h1{width:100%;margin:0 0 4px!important}
            .actions .btn{flex:1;text-align:center}
            .table{font-size:13px;min-width:0;width:100%;table-layout:fixed}
            .table th,.table td{padding:10px 6px;overflow-wrap:anywhere}
            .table .hide-mobile{display:none}
            .table th:first-child,.table td:first-child{width:62%}
            .table th:last-child,.table td:last-child{width:38%}
            .table td:last-child .actions{flex-wrap:nowrap}
            .table td:last-child .actions .btn{padding:8px 9px;flex:0 0 auto}
            .chart-heading{align-items:stretch;flex-direction:column}.chart-wrap{overflow-x:auto}
        }
        @media(max-width:380px){
            .admin-grid{grid-template-columns:1fr}
            .admin-menu a{font-size:12px}
        }
    </style>
</head>
<body>
    <button class="admin-menu-toggle" type="button" aria-label="Open admin menu" aria-controls="admin-sidebar" aria-expanded="false"><span class="hamburger-icon" aria-hidden="true"></span></button>
    <div class="admin-menu-backdrop" data-admin-menu-close></div>
    <aside class="admin-sidebar" id="admin-sidebar">
        <button class="admin-menu-close" type="button" aria-label="Close admin menu">×</button>
        <div class="admin-brand">Ozghan Admin<small>CONTENT MANAGEMENT</small></div>
        <nav class="admin-menu" aria-label="Admin navigation">
            <a href="/admin">Dashboard</a>
            <a href="{{ route('admin.content') }}">Content</a>
            <a href="/admin/services">Services</a>
            <a href="/admin/areas">Service areas</a>
            <a href="/admin/works">Our work</a>
            <a href="/admin/quote-options">Quote options</a>
            <a href="/admin/faqs">FAQs</a>
            <a href="/admin/orders">Orders</a>
            <a href="{{ route('admin.profile') }}">Profile</a>
        </nav>
        <form class="admin-logout" method="post" action="{{ route('admin.logout') }}">
            @csrf
            <button class="btn btn-muted" type="submit">Log out</button>
        </form>
    </aside>
    <main class="admin-shell">
        @if(session('status'))
            <div class="alert">{{ session('status') }}</div>
        @endif
        @if($errors->any())
            <div class="alert error">
                <strong>Could not save:</strong>
                <ul style="margin:6px 0 0 18px">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="admin-footer">
        <span>&copy; 2026 Ozghan.com.au</span>
        <nav aria-label="Admin footer links">
            <a href="/">View website</a>
            <a href="{{ route('admin.login') }}">Login</a>
        </nav>
    </footer>
    <script>
        const adminMenuToggle = document.querySelector('.admin-menu-toggle');
        const adminMenuClose = document.querySelector('[data-admin-menu-close]');
        const adminMenuCloseButton = document.querySelector('.admin-menu-close');
        const adminSidebarLinks = document.querySelectorAll('.admin-menu a');
        const setAdminMenu = (open) => {
            document.body.classList.toggle('admin-menu-open', open);
            adminMenuToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
            adminMenuToggle.setAttribute('aria-label', open ? 'Close admin menu' : 'Open admin menu');
        };
        adminMenuToggle.addEventListener('click', () => setAdminMenu(adminMenuToggle.getAttribute('aria-expanded') !== 'true'));
        adminMenuClose.addEventListener('click', () => setAdminMenu(false));
        adminMenuCloseButton.addEventListener('click', () => setAdminMenu(false));
        adminSidebarLinks.forEach((link) => link.addEventListener('click', () => setAdminMenu(false)));
    </script>
</body>
</html>
