@extends('layout.login')

@section('title', 'Log In here!')

@push('styles')
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
@endpush

@section('content')
<div class="full-screen-wrapper">

  <!-- Login Section -->
  <div class="login-form-wrapper">
    <div class="login-form">
      <h3 class="mb-4">Login</h3>
 
      @if ($errors->any())
        <div class="alert alert-danger">
          {{ $errors->first() }}
        </div>
      @endif

      <form action="{{ route('login.custom') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>

      <small class="d-block mt-3 text-center">
        <a href="#">Forgot Password?</a> |
        <a href="">Register</a>
      </small>
    </div>
  </div>
    <div class="card-wrapper">
  <!-- 🔝 TOP ROW: Services + Inquiries -->
  <div class="card-top-row">
    <!-- Services Card -->
    <div class="card border-warning shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Services ⚙️</h5>
        <ul class="mb-0">
          <li>Water Supply</li>
          <li>Internet</li>
          <li>Electricity</li>
          <li>Air Conditioning</li>
        </ul>
      </div>
    </div>

    <!-- Inquiries Card -->
    <div class="card border-primary shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Inquiries ❓</h5>
        <ul class="mb-0">
          <li>Facebook</li>
          <li>Walk-in</li>
          <li>Calls</li>
          <li>Email</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- 🔻 BOTTOM ROW: Vacant + Occupied + Expiring -->
  <div class="card-bottom-row">
    <!-- Vacant -->
    <div class="card border-success shadow-sm" role="button"
         data-bs-toggle="modal" data-bs-target="#vacantModal">
      <div class="card-body">
        <h5 class="card-title">Vacant 🧍‍♂️</h5>
        <ul class="mb-0">
          <li>Room 101</li>
          <li>Room 110</li>
          <li>Room 114</li>
          <li>Room 118</li>
        </ul>
      </div>
    </div>

    <!-- Occupied -->
    <div class="card border-danger shadow-sm" role="button"
         data-bs-toggle="modal" data-bs-target="#occupiedModal">
      <div class="card-body">
        <h5 class="card-title">Occupied 👥</h5>
        <ul class="mb-0">
          <li>Room 215</li>
          <li>Room 214</li>
          <li>Room 212</li>
          <li>Room 213</li>
        </ul>
      </div>
    </div>

    <!-- Expiring Soon -->
    <div class="card border-warning shadow-sm" role="button"
         data-bs-toggle="modal" data-bs-target="#expiringModal">
      <div class="card-body">
        <h5 class="card-title">Expiring Soon ⏰</h5>
        <ul class="mb-0">
           <li>Room 118</li>
           <li>Room 115</li>
           <li>Room 112</li>
           <li>Room 117</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Vacant Modal -->
<div class="modal fade" id="vacantModal" tabindex="-1" aria-labelledby="vacantModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="vacantModalLabel">Vacant Rooms 🧍‍♂️</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <h6>Rooms:</h6>
        <ul>
          <li>Room 101</li>
          <li>Room 110</li>
          <li>Room 114</li>
          <li>Room 118</li>
          <li>Room 118</li>
          <li>Room 115</li>
          <li>Room 112</li>
          <li>Room 117</li>
          <li>Room 119</li>
          <li>Room 116</li>
          <li>Room 113</li>
        </ul>
        <hr>
        <h6>Services:</h6>
        <ul>
          <li>Water Supply</li>
          <li>Internet</li>
          <li>Electricity</li>
          <li>Air Conditioning</li>
        </ul>
        <hr>
        <h6>Inquiries:</h6>
        <ul>
          <li>Facebook:Julie Mae Lumod</li>
          <li>Walk-in/Call</li>
          <li>Calls: 09XXXXXXXXX</li>
          <li>Email:juliemaelumod54@gmail.com</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Occupied Modal -->
<div class="modal fade" id="occupiedModal" tabindex="-1" aria-labelledby="occupiedModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="occupiedModalLabel">Occupied Rooms 👥</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <h6>Rooms:</h6>
        <ul>
          <li>Room 215</li>
          <li>Room 214</li>
          <li>Room 212</li>
          <li>Room 213</li>
          <li>Room 219</li>
          <li>Room 211</li>
          <li>Room 212</li>
          <li>Room 201</li>
          <li>Room 202</li>
          <li>Room 203</li>
        </ul>
        <hr>
        <h6>Services:</h6>
        <ul>
          <li>Water Supply</li>
          <li>Internet</li>
          <li>Electricity</li>
          <li>Air Conditioning</li>
        </ul>
        <hr>
       <h6>Inquiries:</h6>
        <ul>
          <li>Facebook:Julie Mae Lumod</li>
          <li>Walk-in/Call</li>
          <li>Calls: 09XXXXXXXXX</li>
          <li>Email:juliemaelumod54@gmail.com</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Expiring Modal -->
<div class="modal fade" id="expiringModal" tabindex="-1" aria-labelledby="expiringModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="expiringModalLabel">Expiring Soon ⏰</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <h6>Rooms:</h6>
        <ul>
           <li>Room 118</li>
           <li>Room 115</li>
           <li>Room 112</li>
           <li>Room 117</li>
           <li>Room 119</li>
           <li>Room 212</li>
           <li>Room 201</li>
           <li>Room 202</li>
           <li>Room 203</li>
        </ul>
        <hr>
        <h6>Services:</h6>
        <ul>
          <li>Water Supply</li>
          <li>Internet</li>
          <li>Electricity</li>
          <li>Air Conditioning</li>
        </ul>
        <hr>
        <h6>Inquiries:</h6>
        <ul>
          <li>Facebook:Julie Mae Lumod</li>
          <li>Walk-in/Call</li>
          <li>Calls: 09XXXXXXXXX</li>
          <li>Email:juliemaelumod54@gmail.com</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
