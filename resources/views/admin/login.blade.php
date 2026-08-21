@extends('admin.auth-layout')

@section('title', 'Ozghan Admin Login')

@section('content')
<form class="card" method="post" action="{{ route('admin.login.store') }}">
    @csrf
    <h1>Ozghan Admin</h1><p>Manage your website content and quote requests.</p>
    @if(session('status'))<div class="success">{{ session('status') }}</div>@endif
    @if($errors->any())<div class="error">{{ $errors->first() }}</div>@endif
    <label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
    <label for="password">Password</label><input id="password" type="password" name="password" autocomplete="current-password" required>
    <label class="remember"><input type="checkbox" name="remember"> <span>Remember me</span></label>
    <p class="forgot"><a href="{{ route('admin.password.request') }}">Forgot your password?</a></p>
    <button type="submit">Sign in</button>
</form>
@endsection
