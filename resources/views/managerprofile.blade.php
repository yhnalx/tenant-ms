@extends('layout.profilemanager')

@section('title', 'Manager Profile')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<script src="{{ asset('js/sidebar.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endpush
@section('content')
<nav class="navbar">
  <div class="container-fluid d-flex align-items-center">
    <button id="sidebarToggle" aria-label="Toggle sidebar" class="btn btn-link">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand mb-0" href="#">Rent-All</a>
  </div>
</nav>

<main id="mainContent" class="p-4">
  <h3 class="text-center mb-4">Profile</h3>
 
<div class="container my-5">
  <div class="profile-card text-center">
    {{-- Profile Image --}}
    <img 
      src="{{ Auth::user()->profile_photo 
              ? asset('storage/profile_pictures/' . Auth::user()->profile_photo) 
              : 'https://via.placeholder.com/100' }}" 
      alt="Manager Avatar" 
      class="profile-avatar shadow">

    {{-- Name & Email --}}
    <h4 class="fw-bold">{{ Auth::user()->name }}</h4>
    <p class="text-muted mb-1">{{ Auth::user()->email }}</p>
    <p><span class="badge bg-primary">{{ Auth::user()->role ?? 'Manager' }}</span></p>

    <hr>

    {{-- Personal Info --}}
    <div class="text-start">
      <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
      <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
      <p><strong>Role:</strong> {{ Auth::user()->role ?? 'Manager' }}</p>
      <p><strong>Contact:</strong> {{ Auth::user()->contact ?? 'Not provided' }}</p>
      <p><strong>Gender:</strong> {{ Auth::user()->gender ?? 'Not specified' }}</p>
      <p><strong>Joined:</strong> {{ Auth::user()->created_at->format('F d, Y') }}</p>
    </div>

    {{-- Action Buttons --}}
    <div class="d-flex justify-content-center gap-2 mt-3 flex-wrap">
      <a href="{{ route('Dashboard') }}" class="btn btn-outline-secondary">
        ← Back to Dashboard
      </a>
      <a href="#" class="btn btn-warning">Edit Profile</a>
      <a href="#" class="btn btn-secondary">Change Password</a>
      <a href="#" class="btn btn-dark">Download Backup</a>
    </div>
  </div>
</div>
@endsection

