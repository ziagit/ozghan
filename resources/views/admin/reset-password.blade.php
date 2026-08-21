@extends('admin.auth-layout')

@section('title', 'Reset Password · Ozghan Admin')

@section('content')
<form class="card" method="post" action="{{ route('admin.password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <h1>Set a new password</h1><p>Choose a new password for your Ozghan admin account.</p>
    @if($errors->any())<div class="error">{{ $errors->first() }}</div>@endif
    <label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email', $email) }}" autocomplete="email" required>
    <label for="password">New password</label><input id="password" type="password" name="password" autocomplete="new-password" minlength="8" required>
    <label for="password_confirmation">Confirm new password</label><input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" minlength="8" required>
    <button type="submit">Reset password</button>
</form>
@endsection
