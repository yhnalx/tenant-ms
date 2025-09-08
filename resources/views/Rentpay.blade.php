@extends('layout.rentpay')

@section('title', 'Rent Payment')

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
  <h2 class="text-center mb-4">Rent Payment</h2>
  <hr>
    <div class="search-bar-wrapper">
      <input type="text" class="search-input" placeholder="Search...">
      <button class="search-btn">🔍</button>
    </div>

    <!-- Main Table -->
    <table class="table table-bordered table-striped mt-4">
     <tr>
          <th>Full Name</th>
          <th>Room Number</th>
          <th>Amount</th>
          <th>Payment Date</th>
          <th>Status</th>
          <th>Payment Method</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="text-center align-middle">
        <tr>
          <td>Shahani</td>
          <td>102-B</td>
          <td>5000</td>
          <td>2025-08-01</td>
          <td><span class="badge bg-primary">Gcash</span></td>
          <td><span class="badge bg-success">Paid</span></td>
          <td>
            <button class="btn btn-sm btn-primary">View</button>
            <button class="btn btn-sm btn-warning"> Delete</button>
            <button class="btn btn-sm btn-danger">Edit</button>
          </td>
        </tr>
        <tr>
          <td>Keren</td>
          <td>110</td>
          <td>5000</td>
          <td>2025-08-01</td>
          <td><span class="badge bg-primary">Gcash</span></td>
          <td><span class="badge bg-warning">Unpaid</span></td>
          <td>
            <button class="btn btn-sm btn-primary">View</button>
            <button class="btn btn-sm btn-warning"> Send Reminder</button>
          </td>
        </tr>
        <tr>
          <td>Dayan</td>
          <td>115</td>
          <td>5000</td>
          <td>2025-08-01</td>
          <td><span class="badge bg-primary">Gcash</span></td>
          <td><span class="badge bg-danger">Overdue</span></td>
          <td>
            <button class="btn btn-sm btn-primary">View</button>
            <button class="btn btn-sm btn-danger">Send Reminder</button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Button to trigger Due Dates Modal -->
    <div style="text-align: left;">
      <button type="button" class="btn btn-primary w-45" data-bs-toggle="modal" data-bs-target="#dueDatesModal">
        View Due Dates
      </button>
    </div>
  </form>
</div>

<!-- VIEW PROOF MODAL -->
<div class="modal fade" id="viewProofModal" tabindex="-1" aria-labelledby="viewProofModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewProofModalLabel">Payment Proof</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <!-- Sample image (replace with dynamic from DB if needed) -->
        <img src="{{ asset('images/proofs/sample-proof.jpg') }}" class="img-fluid rounded shadow" alt="Payment Proof">
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="{{ asset('images/proofs/sample-proof.jpg') }}" download class="btn btn-primary">Download Proof</a>
      </div>
    </div>
  </div>
</div>

<!-- EDIT PAYMENT MODAL -->
<div class="modal fade" id="editPaymentModal" tabindex="-1" aria-labelledby="editPaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title" id="editPaymentModalLabel">Edit Payment Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Tenant Name</label>
            <input type="text" class="form-control" value="Shahani" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Room Number</label>
            <input type="text" class="form-control" value="102-B" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" class="form-control" value="5000">
          </div>
          <div class="mb-3">
            <label class="form-label">Payment Method</label>
            <select class="form-select">
              <option selected>Gcash</option>
              <option>Cash</option>
              <option>Bank Transfer</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Payment Status</label>
            <select class="form-select">
              <option selected>Paid</option>
              <option>Unpaid</option>
              <option>Overdue</option>
              <option>Pending</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Remarks</label>
            <textarea class="form-control" rows="2"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Due Dates Modal -->
<div class="modal fade" id="dueDatesModal" tabindex="-1" aria-labelledby="dueDatesModalLabel" aria-hidden="true"> 
  <div class="modal-dialog modal-xxl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dueDatesModalLabel">Monthly Dues & Rent Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <div class="table-responsive">
          <table class="table table-bordered align-middle text-center">
            <thead class="table-dark">
              <tr>
                <th rowspan="2">Tenant Name</th>
                <th rowspan="2">Room Number</th>
                <th rowspan="2">Remarks</th>
                <th colspan="2">Rental / Water / Internet</th>
                <th colspan="6">Cepalco</th>
                <th rowspan="1">Total Dues</th>
              </tr>
              <tr>
                <!-- Rental/Water/Internet sub-columns -->
                <th>Status</th>
                <th>Amount Due</th>

                <!-- Cepalco sub-columns -->
                <th>Status</th>
                <th>Present</th>
                <th>Previous</th>
                <th>kWh Cons.</th>
                <th>Amount Due</th>
                <th>Rate</th>

                <th>Amount Due</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Shahani</td>
                <td>101</td>
                <td>Personal Aid</td>
                <td><span class="badge bg-success">Paid</span></td>
                <td>₱6,700.00</td>
                <td><span class="badge bg-warning">Pending</span></td>
                <td>1200</td>
                <td>1180</td>
                <td>20</td>
                <td>₱300.00</td>
                <td>₱12.00</td>
                <td><strong>₱7,780.00</strong></td>
              </tr>
              <tr>
                <td>Keren</td>
                <td>102-B</td>
                <td>Extension</td>
                <td><span class="badge bg-success">Paid</span></td>
                <td>₱6,700.00</td>
                <td><span class="badge bg-success">Paid</span></td>
                <td>980</td>
                <td>960</td>
                <td>20</td>
                <td>₱0.00</td>
                <td>₱12.00</td>
                <td><strong>₱7,500.00</strong></td>
              </tr>
            </tbody>
             <tfoot class="table-secondary fw-bold">
    <!-- Totals for Rental/Water/Internet -->
                <tr>
                  <td class="text-end">Total (Rental/Water/Internet):</td>
                  <td>₱15,280.00</td>
                  <td>₱6,700.00</td>
                  <td colspan="7"></td>
                </tr>

                <!-- Totals for Cepalco -->
                <tr>
                  <td class="text-end">Total (Cepalco):</td>
                  <td colspan="2"></td>
                  <td>₱2,500.00</td>
                  <td>₱3,000.00</td>
                  <td>₱2,800.00</td>
                  <td>₱3,200.00</td>
                  <td>₱1,500.00</td>
                  <td>₱2,000.00</td>
                  <td></td>
                </tr>

                <!-- Totals for All (Total Dues) -->
                <tr>
                  <td class="text-end">Total Dues (All):</td>
                  <td colspan="8"></td>
                  <td>₱25,480.00</td>
                </tr>
              </tfoot>
            </table>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection


