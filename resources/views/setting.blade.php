@extends('layout.setting')

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



<main id="mainContent" class="p-4">
  <h2 class="text-center mb-4">Settings</h2>

<hr>
<div class="container mt-4">
  <div class="row">

    <!-- Left Column -->
    <div class="row g-4 mt-3 equal-height-row">

  <!-- Left Column -->
  <div class="col-md-6 d-flex flex-column gap-3">
    <a href="{{ route('settinguser') }}" class="setting-box">
      👤 Account Settings
      <p>Manage profile, update info, and change password.</p>
    </a>

    <a href="{{ route('settingpayment') }}" class="setting-box">
      💳 Payment Settings
      <p>Configure rent rates, penalties, and payment methods.</p>
    </a>

    <a href="{{ route('settingdocu') }}" class="setting-box">
      📑 Document Templates
      <p>Customize lease agreements, notices, and documents.</p>
    </a>

    <a href="{{ route('settingprefen') }}" class="setting-box">
      ⚙️ System Preferences
      <p>Timezone, currency, notifications, penalty rules.</p>
    </a>
  </div>

  <!-- Right Column -->
  <div class="col-md-6 d-flex flex-column gap-3">
    <a href="{{ route('settingteam') }}" class="setting-box">
      👥 Team Management
      <p>Manage staff roles & permissions (RBAC).</p>
    </a>

    <a href="{{ route('settingauth') }}" class="setting-box">
      📝 Audit Logs
      <p>Track who edited settings & when updates were made.</p>
    </a>

    <a href="{{ route('settingback') }}" class="setting-box">
      💾 Backup & Restore
      <p>Export data (CSV, Excel, PDF) or backup database copy.</p>
    </a>
  </div>

</div>

@endsection