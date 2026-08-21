@extends('admin.auth-layout')

@section('title', 'Forgot Password · Ozghan Admin')

@section('content')
<form class="card" method="post" action="{{ route('admin.password.email') }}">
    @csrf
    <h1>Forgot your password?</h1><p>Enter your admin email and we’ll send you a secure link to choose a new password.</p>
    @if(session('status'))<div class="success">{{ session('status') }}</div>@endif
    @if($errors->any())<div class="error">{{ $errors->first() }}</div>@endif
    <label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
    <button type="submit">Email reset link</button>
    <a class="back-link" href="{{ route('admin.login') }}">Back to sign in</a>
</form>
@endsection
