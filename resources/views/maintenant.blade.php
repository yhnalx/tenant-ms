@extends('layout.maintenant')

@section('title', 'Maintenance Requests')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
<script src="{{ asset('js/sidebar.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
@endpush

@section('content')
@php
    // SAFE DEFAULT para hindi undefined kahit ma-render ang view na ito nang walang $hasPending
    $hasPending = $hasPending ?? false;
@endphp

<nav class="navbar">
  <div class="container-fluid d-flex align-items-center">
    <button id="sidebarToggle" aria-label="Toggle sidebar" class="btn btn-link">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand mb-0" href="#">Rent-All</a>
  </div>
</nav>

<main id="mainContent" class="p-4">
  <h3 class="text-center mb-4">Submit a Maintenance Request</h3>
  <hr>

  @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
  @endif

  {{-- Kung may pending request, huwag ipakita ulit ang form --}}
  @if($hasPending)
      <div class="alert alert-warning text-center">
          You already have a <strong>pending maintenance request</strong>.
          Please wait until it is processed.
      </div>
  @else
      <form action="{{ route('tenant.maintenance.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" id="title" required>
          </div>

          <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
          </div>

          <div class="mb-3">
              <label for="priority" class="form-label">Priority</label>
              <select class="form-select" name="priority" id="priority" required>
                  <option value="Low">Low</option>
                  <option value="Medium">Medium</option>
                  <option value="High">High</option>
              </select>
          </div>

          <div class="mb-3">
              <label for="proof_image" class="form-label">Proof Image (optional)</label>
              <input type="file" class="form-control" name="proof_image" id="proof_image">
          </div>

          <button type="submit" class="btn btn-primary w-100">Submit Request</button>
      </form>
  @endif
</main>
@endsection
