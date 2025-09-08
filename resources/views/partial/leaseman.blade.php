<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>

  <script src="{{ asset('js/dashboard.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Custom Styles -->
  @stack('styles')
</head>
<body>

<!-- Sidebar -->
<div id="sidebar" class="bg-light p-3 position-fixed h-100 z-2" style="top: 56px; width: 250px; left: -250px; transition: left 0.3s ease;">
  <button id="sidebarClose" aria-label="Close sidebar" class="btn btn-close mb-3"></button>

  <!-- Profile Section -->
<ul class="list-unstyled">
  <a href="{{ route('managerprofile') }}" class="d-flex align-items-center gap-3 p-2 text-dark text-decoration-none rounded hover-effect "  aria-expanded="false">
    <img src="https://via.placeholder.com/40" alt="Profile"
         class="rounded-circle border border-white" width="40" height="40">

    <div class="d-flex flex-column">
      <span class="fw-semibold">{{ Auth::user()->name }}</span>
      <small class="text-muted">{{ Auth::user()->role ?? 'Manager' }}</small>
    </div>
  </a>
  <hr>

  <!-- Navigation Links -->
  <ul class="list-unstyled">
    <li>
      <a href="{{ route('Dashboard') }}" class="text-decoration-none text-dark d-flex align-items-center mb-2">
        <i class="bi bi-speedometer2 me-2"></i> Home
      </a>
    </li>
    <li>
      <a href="{{ route('tenantman') }}" class="text-decoration-none text-dark d-flex align-items-center mb-2">
        <i class="bi bi-person-plus-fill me-2"></i> Tenant Management
      </a>
    </li>
    <li>
      <a href="{{ route('leaseman') }}" class="text-decoration-none text-dark d-flex align-items-center mb-2">
        <i class="bi bi-file-earmark-text-fill me-2"></i> Lease Management
      </a>
    </li>
    <li>
      <a href="{{ route('rentpay') }}" class="text-decoration-none text-dark d-flex align-items-center mb-2">
        <i class="bi bi-wallet2 me-2"></i> Rent Payment
      </a>
    </li>
    <li>
      <a href="{{ route('mainte') }}" class="text-decoration-none text-dark d-flex align-items-center mb-2">
        <i class="bi bi-tools me-2"></i> Maintenance Requests
      </a>
    </li>
    <li>
      <a href="{{ route('deposit') }}" class="text-decoration-none text-dark d-flex align-items-center mb-2">
        <i class="bi bi-coin me-2"></i> Deposit
      </a>
    </li>
    <li>
      <a href="{{ route('reports.index') }}" class="text-decoration-none text-dark d-flex align-items-center mb-2">
        <i class="bi-file-text me-2"></i> Reports
      </a>
    </li>
    <li>
     <a href="{{ route('setting') }}" class="text-decoration-none text-dark d-flex align-items-center mb-2">
        <i class="bi bi-gear-fill me-2 "></i> Settings
      </a>
    </li>
  </ul>
  <!-- Logout Button at Bottom -->
  <hr class="mt-auto">
  <form method="POST" action="{{ route('logout') }}" class="mt-3">
    @csrf
    <button type="submit" class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center">
      <i class="bi bi-box-arrow-right me-2"></i> Logout
    </button>
  </form>
</div>
