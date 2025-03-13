@extends('base')
@section('title', 'Login')

@if(session('success'))
<div class="alert alert-success" id="success">
    {{ Session::get('success') }}
</div>
@endif

@if(session('fail'))
<div class="alert alert-danger" id="fail">
    {{ Session::get('fail') }}
</div>
@endif


<form method="POST" action="{{ route('auth.login') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Enter your password">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>