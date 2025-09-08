@extends('layout.propertylisting')

@section('title', 'Property Listing')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/table.css') }}">
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
    <i class="bi bi-bell-fill me-2"></i> 
  </div>
</nav>

<div class="container my-5">
  <h2 class="text-center mb-4">Property Listing</h2>
  <form>
<hr>
  <div class="search-bar-wrapper">
  <input type="text" class="search-input" placeholder="Search...">
  <button class="search-btn">🔍</button>
</div>
