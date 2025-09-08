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

      <a href="tenantsetting" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left me-2"></i> Back to Settings
      </a> 
<div class="container mt-4">
  <div class="row">

    <div class="row g-4">
    <!-- Lease Agreement -->
    <div class="col-md-6 mb-4">
      <div class="card h-100 p-3">
        <h5>📄 Lease Agreement</h5>
        <p>View or download your current lease agreement.</p>
        <a href="{{ route('tenantsetting') }}" class="btn btn-primary">Download PDF</a>
      </div>
    </div>

    <!-- Payment Receipts -->
    <div class="col-md-6 mb-4">
      <div class="card h-100 p-3">
        <h5>💵 Payment Receipts</h5>
        <p>Download receipts for all completed payments.</p>
        <a href="{{ route('tenantsetting') }}" class="btn btn-primary">View Receipts</a>
      </div>
    </div>
</div>
@endsection