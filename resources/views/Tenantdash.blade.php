@extends('layout.Tenantdash')

@section('title', 'Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/tenantdash.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>
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

&nbsp
<!-- Main Content -->
<main id="mainContent" class="p-4">
    <h3 class="mb-4">Welcome, {{ Auth::user()->name ?? 'Tenant' }}!</h3>

    <div class="row g-4">

        <!-- Announcements -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card p-3 shadow-sm border-0">
            <h5><i class="bi bi-megaphone text-danger me-2"></i> Announcements</h5>
            <hr>
            <ul class="list-group">
                <li class="list-group-item">Water maintenance on August 22, 2025 from 8AM - 5PM.</li>
                <li class="list-group-item">Garbage collection schedule: Every Monday & Thursday at 7AM.</li>
                <li class="list-group-item">Community meeting on September 5, 2025 at 6PM in Lobby.</li>
            </ul>
        </div>
    </div>
</div>

<!-- Tenant Overview Cards -->
<div class="row mt-4 g-4">
    <!-- Upcoming Payment -->
    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0">
            <h5><i class="bi bi-cash-coin text-success me-2"></i> Upcoming Payment</h5>
            <hr>
            <p><strong>Amount Due:</strong> ₱5,000</p>
            <p><strong>Due Date:</strong> August 30, 2025</p>
        </div>
    </div>

    <!-- Lease Status -->
    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0">
            <h5><i class="bi bi-house-door text-primary me-2"></i> Lease Status</h5>
            <hr>
            <p><strong>Status:</strong> <span class="badge bg-success">Active</span></p>
            <p><strong>Lease End:</strong> Jan 15, 2026</p>
        </div>
    </div>

    <!-- Outstanding Balance -->
    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0">
            <h5><i class="bi bi-exclamation-triangle text-danger me-2"></i> Outstanding Balance</h5>
            <hr>
            <p><strong>Amount:</strong> ₱1,200</p>
            <p><strong>Status:</strong> <span class="badge bg-danger">Pending</span></p>
        </div>
    </div>

    <!-- Total Payments Made -->
    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0">
            <h5><i class="bi bi-check-circle text-success me-2"></i> Total Payments Made</h5>
            <hr>
            <p><strong>Total Paid:</strong> ₱18,000</p>
        </div>
    </div>

    <!-- Next Maintenance -->
    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0">
            <h5><i class="bi bi-tools text-warning me-2"></i> Next Maintenance</h5>
            <hr>
            <p>General Cleaning – Sep 5, 2025</p>
        </div>
    </div>

    <!-- Support Requests / Tickets -->
    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0">
            <h5><i class="bi bi-ticket-detailed text-info me-2"></i> Support Requests</h5>
            <hr>
            <p><strong>Open Requests:</strong> 2</p>
        </div>
    </div>
</div>
</main>
@endsection

