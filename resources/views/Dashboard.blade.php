@extends('layout.dashboard')

@section('title', 'Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
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
    <h3 class="mb-4">Welcome, {{ Auth::user()->name ?? 'Manager' }}!</h3>
    <hr> 
    
    <div class="row g-4">

  <!-- Total Units -->
  <div class="col-md-4">
    <div class="card p-3 text-center" role="button" data-bs-toggle="modal" data-bs-target="#unitsModal">
      <i class="bi bi-building text-primary fs-1 me-3"></i>
      <div>
        <h5>Total Units</h5>
        <p class="fs-3 text-primary">21</p>
      </div>
    </div>
  </div>

  <!-- Lease -->
  <div class="col-md-4">
    <div class="card p-3 text-center" role="button" data-bs-toggle="modal" data-bs-target="#leaseModal">
      <i class="bi bi-file-earmark-text text-primary me-2"></i>
      <div>
        <h5>Lease</h5>
        <p class="fs-3 text-primary">3 of 5</p>
        <p>Expires in 0-30 days</p>
      </div>
    </div>
  </div>
 &nbsp
  <!-- Status -->
  <div class="col-md-4">
    <div class="card p-3" role="button" data-bs-toggle="modal" data-bs-target="#statusModal">
      <h6><i class="bi bi-activity text-success me-2"></i> Status</h6>
      <div class="chart-container" style="height:200px;">
        <canvas id="statusChart"></canvas>
      </div>
      <p class="mt-2 mb-0">
        <span class="text-success">12 Active</span> | 
        <span class="text-danger">2 Inactive</span>
      </p>
    </div>
  </div>

  <!-- Properties -->
  <div class="col-md-4">
    <div class="card p-3" role="button" data-bs-toggle="modal" data-bs-target="#propertiesModal">
      <h6><i class="bi bi-houses text-success me-2"></i> Properties</h6>
      <div class="chart-container" style="height:200px;">
        <canvas id="propertiesChart"></canvas>
      </div>
      <p class="mt-2 mb-0">
        <span class="text-success">12 Vacant</span> | 
        <span class="text-warning">8 Occupied</span>
      </p>
    </div>
  </div>

<!-- Rent Outstanding -->
<div class="col-md-4">
  <div class="card p-3" role="button" data-bs-toggle="modal" data-bs-target="#rentModal">
    <h6><i class="bi bi-cash-coin text-warning me-2"></i> Outstanding Rent per month</h6>
    <div class="chart-container" style="height:200px;">
      <canvas id="rentChart"></canvas>
    </div>
  </div>
</div>


  <!-- To-do List -->
  <div class="col-md-4">
    <div class="card p-3" role="button" data-bs-toggle="modal" data-bs-target="#todoModal">
      <h6><i class="bi bi-list text-danger me-2"></i> To do List</h6>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">List Unit 101, 102, 103</li>
        <li class="list-group-item">Add New Tenant</li>
        <li class="list-group-item">Maintenance Request</li>
        <li class="list-group-item">Expire</li>
        <li class="list-group-item">Renew</li>
      </ul>
      <button class="btn btn-sm btn-success mt-2">+ Add Task</button>
    </div>
  </div>

  <!-- Maintenance -->
  <div class="col-md-4">
    <div class="card p-3" role="button" data-bs-toggle="modal" data-bs-target="#maintenanceModal">
      <h6><i class="bi bi-tools text-danger me-2"></i> Maintenance</h6>
      <div class="chart-container" style="height:200px;">
        <canvas id="maintenanceChart"></canvas>
      </div>
      <ul class="mt-2 mb-0">
        <li class="text-info">9 In progress</li>
        <li class="text-success">6 Resolved</li>
        <li class="text-danger">5 New</li>
        <li class="text-warning">1 In review</li>
      </ul>
    </div>
  </div>
</div>

<!-- 🔽 MODALS -->

<!-- Units Modal -->
<div class="modal fade" id="unitsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Total Units</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Total available units: <b>21</b></p>
        <ul>
          <li>101 - Vacant</li>
          <li>102 - Occupied</li>
          <li>103 - Vacant</li>
          <!-- add dynamically later -->
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Lease Modal -->
<div class="modal fade" id="leaseModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title">Lease Details</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Expiring leases in next 30 days:</p>
        <ul>
          <li>Tenant A - Room 110 (Expires Aug 30)</li>
          <li>Tenant B - Room 115 (Expires Sep 2)</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Status Overview</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Currently:</p>
        
        <!-- Active Tenants -->
        <h6 class="text-success">Active Tenants (12)</h6>
        <ul class="list-group mb-3">
          <li class="list-group-item">Juan Dela Cruz</li>
          <li class="list-group-item">Maria Santos</li>
          <li class="list-group-item">Pedro Reyes</li>
          <li class="list-group-item">Anna Lopez</li>
          <li class="list-group-item">Mark Villanueva</li>
          <li class="list-group-item">Sophia Garcia</li>
          <li class="list-group-item">James Torres</li>
          <li class="list-group-item">Carla Mendoza</li>
          <li class="list-group-item">Miguel Ramos</li>
          <li class="list-group-item">Ella Cruz</li>
          <li class="list-group-item">David Bautista</li>
          <li class="list-group-item">Liza Navarro</li>
        </ul>

        <!-- Inactive Tenants -->
        <h6 class="text-danger">Inactive Tenants (2)</h6>
        <ul class="list-group">
          <li class="list-group-item">Kevin Morales</li>
          <li class="list-group-item">Jenny Flores</li>
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- Properties Modal -->
<div class="modal fade" id="propertiesModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title">Properties</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Occupied Side -->
          <div class="col-md-6 border-end">
            <h6 class="text-danger">Occupied Units</h6>
            <ul>
              <li>102 - Occupied (Water Station)</li>
              <li>104 - Occupied (Condo)</li>
              <li>105 - Occupied (Condo)</li>
              <!-- Add dynamically later -->
            </ul>
          </div>

          <!-- Vacant Side -->
          <div class="col-md-6">
            <h6 class="text-success">Vacant Units</h6>
            <ul>
              <li>101 - Vacant (Single Room)</li>
              <li>103 - Vacant (Double Room)</li>
              <li>106 - Vacant (Single Room)</li>
              <!-- Add dynamically later -->
            </ul>
          </div>
        </div>
      </div>
    </div>

<!-- Rent Modal -->
<div class="modal fade" id="RentModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Total Units</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="fw-bold">Total Rent Pending: ₱50,000</p>
        
        <table class="table table-striped">
          <thead class="table-dark">
            <tr>
              <th>Month</th>
              <th>Tenant</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>August 2025</td>
              <td>Tenant A</td>
              <td>₱10,000</td>
            </tr>
            <tr>
              <td>August 2025</td>
              <td>Tenant B</td>
              <td>₱15,000</td>
            </tr>
            <tr>
              <td>July 2025</td>
              <td>Tenant C</td>
              <td>₱25,000</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</main>
@endsection

