@extends('layout.deposittenant')

@section('title', 'Pay now!')

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
  <h3 class="text-center mb-4">Sakit nasa mata huhu</h3>
 <hr>
 &nbsp
  <table class="table table-bordered">
      <thead>

      <!-- Deposit Summary -->
      <div class="card p-4 shadow-sm mb-4">
        <h5 class="mb-3">My Lease Summary</h5>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between">
            <span>Monthly Rent:</span> <strong>₱10,000</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Security Deposit:</span> <strong>₱5,000</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Lease Start Date:</span> <strong>Aug 1, 2025</strong>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Status:</span> <span class="badge bg-success">Active</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection