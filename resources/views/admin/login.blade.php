<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ozghan Admin Login</title>
    <style>
        :root{--ink:#23201c;--clay:#4091C5;--bg:#f2efea;--muted:#5b564f;--line:#d8d0c6;--white:#fff;--font-display:'Manrope',Arial,sans-serif;--font-body:'Manrope',Arial,sans-serif}
        *{box-sizing:border-box} body{font:16px/1.5 Arial,sans-serif;background:var(--bg);color:var(--ink);margin:0;min-height:100vh}
        a{color:inherit;text-decoration:none}.container{max-width:1200px;margin:0 auto;padding:0 24px}.site-header{background:var(--bg);border-bottom:2px solid var(--ink)}.nav{display:flex;align-items:center;justify-content:space-between;gap:20px;padding-top:18px;padding-bottom:18px}
        .brand{display:flex;align-items:center;gap:12px;font-family:var(--font-display);font-size:21px;font-weight:800}.brand-mark{width:30px;height:30px;display:block;object-fit:contain}.brand small{display:block;color:var(--muted);font-size:9px;letter-spacing:.08em;font-weight:400;margin-top:2px}
        .nav-links{display:flex;gap:32px;color:var(--muted);font-size:14px;font-weight:600}.nav-links a:hover{color:var(--ink)}.nav-cta{background:var(--clay);color:#fff;padding:14px 28px;font-weight:bold;border-radius:2px}
        .login-main{min-height:calc(100vh - 190px);display:grid;place-items:center;padding:48px 16px}
        .card{background:#fff;padding:32px;width:min(420px,100%);border:1px solid var(--line);border-radius:5px;box-shadow:0 8px 24px rgba(35,32,28,.06)}
        .card h1{margin:0 0 8px}.card p{color:var(--muted);margin:0 0 22px}
        label{display:block;font-weight:bold;margin:14px 0 5px}
        input{width:100%;padding:11px;border:1px solid #bbb;border-radius:3px;font:inherit}.remember{display:flex;align-items:center;gap:8px;font-weight:400;margin:14px 0 0}.remember input{width:16px;height:16px;margin:0;accent-color:var(--clay)}
        button{margin-top:18px;width:100%;padding:12px;background:var(--clay);color:#fff;border:0;border-radius:3px;font-weight:bold;cursor:pointer}
        .error{color:#a32f2f}
        body.admin-login .site-header .nav-cta .btn{min-height:44px!important;padding:10px 18px!important;font-size:.85rem!important;line-height:1.3!important}
        .site-footer{background:var(--ink);color:#c9c4bb;padding:28px 24px}.footer-inner{max-width:1200px;margin:auto;display:flex;justify-content:space-between;align-items:center;gap:20px}.footer-copy{font-size:13px}
        @media(max-width:720px){.nav{padding:15px 16px}.nav-links{display:none}.nav-cta{padding:9px 12px;font-size:13px}.login-main{padding:32px 16px}.card{padding:24px}.footer-inner{align-items:flex-start;flex-direction:column;gap:8px}}
    </style>
</head>
<body class="admin-login">
    @include('site.partials.header')
    <main class="login-main"><form class="card" method="post" action="{{ route('admin.login.store') }}">
        @csrf
        <h1>Ozghan Admin</h1><p>Manage your website content and quote requests.</p>
        @if($errors->any())<div class="error">{{ $errors->first() }}</div>@endif
        <label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" required>
        <label for="password">Password</label><input id="password" type="password" name="password" required>
        <label class="remember"><input type="checkbox" name="remember"> <span>Remember me</span></label>
        <button type="submit">Sign in</button>
    </form></main>
    <footer class="site-footer"><div class="footer-inner"><div class="brand"><img class="brand-mark" src="/logo.png" alt=""><span>Ozghan<small>BRISBANE TILING</small></span></div><div class="footer-copy">© 2026 Ozghan.com · Brisbane, Queensland</div></div></footer>
</body>
</html>
