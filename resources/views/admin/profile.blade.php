@extends('admin.layout')

@section('title', 'Admin Profile · Ozghan')

@section('content')
<div class="actions"><h1>Admin profile</h1></div>

<div class="admin-card">
    <h2>Profile details</h2>
    <p>Update the name and email address used for your admin account.</p>
    <form method="post" action="{{ route('admin.profile.update') }}">
        @csrf @method('PUT')
        <div class="field"><label for="name">Name</label><input id="name" name="name" value="{{ old('name', $user->name) }}" required maxlength="255"></div>
        <div class="field"><label for="email">Email</label><input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required maxlength="255"></div>
        <button class="btn" type="submit">Save profile details</button>
    </form>
</div>

<div class="admin-card">
    <h2>Change password</h2>
    <p>Use your current password to set a new one.</p>
    <form method="post" action="{{ route('admin.profile.password') }}">
        @csrf @method('PUT')
        <div class="field"><label for="current_password">Current password</label><input id="current_password" type="password" name="current_password" autocomplete="current-password" required></div>
        <div class="field"><label for="password">New password</label><input id="password" type="password" name="password" autocomplete="new-password" minlength="8" required></div>
        <div class="field"><label for="password_confirmation">Confirm new password</label><input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" minlength="8" required></div>
        <button class="btn" type="submit">Change password</button>
    </form>
</div>
@endsection
