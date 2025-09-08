@extends('layout.deposit')

@section('title', 'Deposits')

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

&nbsp
<!-- Main Content -->
<main id="mainContent" class="p-4">
  <h2 class="text-center mb-4">Deposit</h2>
<hr>
  <div class="search-bar-wrapper">
    <input type="text" class="search-input" placeholder="Search...">
    <button class="search-btn">🔍</button>
  </div>

  <!-- Deposit Table -->
  <table class="table table-bordered table-striped mt-4">
    <thead class="table text-center">
      <tr>
        <th>Tenant</th>
        <th>Unit</th>
        <th>Deposit Amount</th>
        <th>Date Paid</th>
        <th>Status</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Julie Mae</td>
        <td>Room 101</td>
        <td>₱5,000</td>
        <td>2025-08-01</td>
        <td><span class="badge bg-success">Active</span></td>
        <td class="text-center">
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#proofModalJulie">View Proof</button>
          <button class="btn btn-sm btn-warning">Edit</button>
          <button class="btn btn-sm btn-danger">Delete</button>
          <button class="btn btn-sm btn-success">Refund</button>
        </td>
      </tr>
      <tr>
        <td>Keren</td>
        <td>Room 102</td>
        <td>₱4,500</td>
        <td>2025-08-03</td>
        <td><span class="badge bg-success">Active</span></td>
        <td class="text-center">
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#proofModalKeren">View Proof</button>
          <button class="btn btn-sm btn-warning">Edit</button>
          <button class="btn btn-sm btn-danger">Delete</button>
          <button class="btn btn-sm btn-success">Refund</button>
        </td>
      </tr>
      <tr>
        <td>Shahani</td>
        <td>Room 103</td>
        <td>₱6,000</td>
        <td>2025-08-05</td>
        <td><span class="badge bg-success">Active</span></td>
        <td class="text-center">
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#proofModalShahani">View Proof</button>
          <button class="btn btn-sm btn-warning">Edit</button>
          <button class="btn btn-sm btn-danger">Delete</button>
          <button class="btn btn-sm btn-success">Refund</button>
        </td>
      </tr>
      <tr>
        <td>Randolf</td>
        <td>Room 104</td>
        <td>₱5,500</td>
        <td>2025-08-07</td>
        <td><span class="badge bg-warning">Pending</span></td>
        <td class="text-center">
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#proofModalRandolf">View Proof</button>
          <button class="btn btn-sm btn-warning">Edit</button>
          <button class="btn btn-sm btn-danger">Delete</button>
          <button class="btn btn-sm btn-success">Refund</button>
        </td>
      </tr>
      <tr>
        <td>Dyane</td>
        <td>Room 105</td>
        <td>₱4,800</td>
        <td>2025-08-10</td>
        <td><span class="badge bg-success">Active</span></td>
        <td class="text-center">
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#proofModalDyane">View Proof</button>
          <button class="btn btn-sm btn-warning">Edit</button>
          <button class="btn btn-sm btn-danger">Delete</button>
          <button class="btn btn-sm btn-success">Refund</button>
        </td>
      </tr>
    </tbody>
  </table>
</main>

<!-- Proof Modals -->
<div class="modal fade" id="proofModalJulie" tabindex="-1" aria-labelledby="proofModalJulieLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deposit Proof - Julie Mae</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img src="/images/proofs/julie_deposit.jpg" class="img-fluid rounded shadow" alt="Julie Proof">
        <p class="mt-3 text-muted">Uploaded on: 2025-08-01</p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="proofModalKeren" tabindex="-1" aria-labelledby="proofModalKerenLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deposit Proof - Keren</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img src="/images/proofs/keren_deposit.jpg" class="img-fluid rounded shadow" alt="Keren Proof">
        <p class="mt-3 text-muted">Uploaded on: 2025-08-03</p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="proofModalShahani" tabindex="-1" aria-labelledby="proofModalShahaniLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deposit Proof - Shahani</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img src="/images/proofs/shahani_deposit.jpg" class="img-fluid rounded shadow" alt="Shahani Proof">
        <p class="mt-3 text-muted">Uploaded on: 2025-08-05</p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="proofModalRandolf" tabindex="-1" aria-labelledby="proofModalRandolfLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deposit Proof - Randolf</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img src="/images/proofs/randolf_deposit.jpg" class="img-fluid rounded shadow" alt="Randolf Proof">
        <p class="mt-3 text-muted">Uploaded on: 2025-08-07</p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="proofModalDyane" tabindex="-1" aria-labelledby="proofModalDyaneLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Deposit Proof - Dyane</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <img src="/images/proofs/dyane_deposit.jpg" class="img-fluid rounded shadow" alt="Dyane Proof">
        <p class="mt-3 text-muted">Uploaded on: 2025-08-10</p>
      </div>
    </div>
  </div>
</div>

@endsection