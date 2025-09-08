@extends('layout.leasetenant')

@section('title', 'Lease')

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
  <h3 class="text-center mb-4">Room</h3>
<hr>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Room Number</th>
        <th>Room Type</th>
        <th>Lease Start</th>
        <th>Lease End</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @if($tenant)
      <tr>
        <td>{{ $tenant->room_number }}</td>
        <td>{{ $tenant->room_type }}</td>
        <td>{{ $tenant->lease_start }}</td>
        <td>{{ $tenant->lease_end }}</td>
        <td>
          @if($tenant->lease_file)
            <a href="{{ asset('storage/leases/' . $tenant->lease_file) }}" class="btn btn-primary btn-sm" target="_blank">Download Lease</a>
          @endif
          <button type="button" class="btn btn-warning btn-sm">Request Renewal</button>
        </td>
      </tr>
      @else
      <tr>
        <td colspan="5" class="text-center">No lease information available.</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
