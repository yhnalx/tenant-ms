@extends('layout.tenantapply')

@section('title', 'Tenant Management Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
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
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p>This is your dashboard. Click "Apply as Tenant" to submit your application.</p>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(isset($application))
    <div class="alert alert-info mt-3">
        <strong>Current Status:</strong>

        @if($application->status == 'pending')
            <span class="badge bg-warning text-dark">Pending</span>
            <p class="mt-2">Your application is still under review. Please wait.</p>

        @elseif($application->status == 'approved')
            <span class="badge bg-success">Approved</span>
            <p class="mt-2">You have been approved!</p>
            <a href="{{ route('lease_agreement') }}" class="btn btn-primary mt-2">Proceed</a>

        @elseif($application->status == 'rejected')
            <span class="badge bg-danger">Rejected</span>
            <p class="mt-2 text-danger">Sorry, you can’t proceed. Your application was rejected.</p>

        @else
            <span class="badge bg-secondary">Unknown</span>
            <p class="mt-2">Status not recognized.</p>
        @endif
    </div>
@else
    {{-- Lalabas lang ito kapag wala talagang application record --}}
    <p class="mt-2 text-danger">You have not submitted an application yet.</p>
@endif

</div>
</main>
@endsection
