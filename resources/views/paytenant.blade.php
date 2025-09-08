@extends('layout.paytenant')

@section('title', 'Pay now!')

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

<main id="mainContent" class="p-4">
  <h3 class="text-center mb-4">Sakit nasa mata huhu</h3>
 <hr>
  <table class="table table-bordered">
      <thead>
    <tr>
      <th>Remarks</th>
      <th>Rental / Water / Internet</th>
      <th>Cepalco</th>
      <th>Total Dues</th>
      <th>Due Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($payments as $payment)
    <tr>
      <td>{{ $payment->remarks }}</td>
      <td>₱{{ number_format($payment->rental_due + $payment->water_due + $payment->internet_due, 2) }}</td>
      <td>₱{{ number_format($payment->cepalco_due, 2) }}</td>
      <td><strong>₱{{ number_format($payment->total_due, 2) }}</strong></td>
      <td>
        {{ \Carbon\Carbon::parse($payment->due_date)->format('M d, Y') }}
      </td>
      <td>
        @if($payment->status == 'Paid')
          <span class="badge bg-success">Paid</span>
        @elseif(\Carbon\Carbon::parse($payment->due_date)->isPast())
          <span class="badge bg-danger">Overdue</span>
          <button class="btn btn-sm btn-warning">Pay Now</button>
        @else
          <span class="badge bg-warning">Pending</span>
          <button class="btn btn-sm btn-primary">Pay Before Due</button>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</from>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


@endsection
