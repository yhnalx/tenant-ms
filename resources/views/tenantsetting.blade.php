@extends('layout.tenantsetting')

@section('title', 'Setting')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/setting.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<script src="{{ asset('js/sidebar.js') }}"></script>
@endpush


@section('content')
<nav class="navbar">
  <div class="container-fluid d-flex align-items-center">
    <button id="sidebarToggle" class="btn btn-link">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand mb-0" href="#">Rent-All</a>
  </div>
</nav>



 <div class="container mt-4">
    <div class="col-md-10 p-4">
      <h3 class="fw-bold mb-4">Settings</h3> 

<div class="container mt-4">
  <div class="row">

    <!-- Left Column -->
    <div class="row g-4 mt-3 equal-height-row">
  <!-- Left Column -->
  <div class="col-md-6 d-flex flex-column gap-3">
    <a href="{{ route('tenantacc') }}" class="setting-box">
      👤 Account Settings
      <p>Manage profile, update info, and change password.</p>
    </a>

    <a href="{{ route('tenantpay') }}" class="setting-box">
      💳 Payment Settings
      <p>Configure rent rates and payment methods.</p>
    </a>
  </div>

  <!-- Right Column -->
  <div class="col-md-6 d-flex flex-column gap-3">
    <a href="{{ route('tenantdocu') }}" class="setting-box">
      👥 Documents Access
      <p>View and manage documents.</p>
    </a>

    <a href="{{ route('tenanthis') }}" class="setting-box">
      📝 Rental History
      <p>View your rental records.</p>
    </a>
  </div>
</div>
@endsection