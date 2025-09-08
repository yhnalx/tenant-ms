<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document Templates</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/settings.css">
</head>
<body>
  <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand mb-0" href="#">Rent-All</a>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="col-md-10 p-4">
      <h3 class="fw-bold mb-4">Document Templates</h3>

      <!-- Back Button -->
      <a href="tenantsetting" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left me-2"></i> Back to Settings
      </a>

      <!-- Upload New Template -->
     <div class="card mb-3 p-3">
  <h5>Payment History</h5>
  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Amount</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>July 31, 2025</td>
        <td>₱5,000</td>
        <td class="text-success">Paid</td>
      </tr>
      <tr>
        <td>June 30, 2025</td>
        <td>₱5,000</td>
        <td class="text-success">Paid</td>
      </tr>
    </tbody>
  </table>
</div>

<div class="card mb-3 p-3">
  <h5>Payment Methods</h5>
  <p>Bank transfer, GCash, or PayMaya.</p>
  <a href="{{ route('tenantsetting') }}" class="btn btn-primary">Edit Methods</a>
</div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
