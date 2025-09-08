@extends('layout.register')

@section('title', 'Tenant Management')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/registerbg.css') }}">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('content')

<div class="container d-flex justify-content-center align-items-center mt-5" style="min-height: 100vh;">
  <div class="card shadow-sm p-4" style="width: 100%; max-width: 500px;">
    <h4 class="text-center mb-4">Create an Account</h4>

  
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group mb-3">
        <label for="name" class="form-label">Username</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="text" class="form-label">Contact Number</label>
        <input type="text" id="contact_number" name="contact_number" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>

      <p class="text-center">
        <a href="{{ route('login') }}">← Back to Login</a>
      </p>
    </form>
@endsection
