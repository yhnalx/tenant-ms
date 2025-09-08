<!DOCTYPE html>
<html lang="en">
<head>
@push('styles')
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

  <div class="container-header text-center">
  <h2 class="fw-bold">TENANT MANAGEMENT SYSTEM</h2>
  <p class="mb-0">Manage your properties and tenants in one place</p>
</div>

<nav class="navbar navbar-expand-md navbar-dark custom-navbar rounded mb-4">
  <div class="container-fluid justify-content-center">
    <div class="navbar-nav d-flex flex-wrap justify-content-center gap-3">
      <a class="nav-link text-white fw-semibold" href="{{ route('getstarted') }}">HOME</a>
      <a class="nav-link text-white fw-semibold" href="#">09123456789</a>
      <a class="nav-link text-white fw-semibold" href="#">CDO</a>
      <a class="nav-link text-white fw-semibold" href="{{ route('register') }}">REGISTER</a>
    </div>
  </div>
</nav>

<div class="text-center mt-4 logo-container">
    <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="Logo">
</div>
  <!-- ✅ Page content goes here -->
  @yield('content')

  <!-- scripts -->
</body>
</html>
