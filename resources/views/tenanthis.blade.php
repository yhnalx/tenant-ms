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
<a href="tenantsetting" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left me-2"></i> Back to Settings
      </a>

  <h5>Rental Records</h5>
    <p>View your past and current rental payments.</p>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Unit/Property</th>
            <th>Lease Start</th>
            <th>Lease End</th>
            <th>Payment Status</th>
            <th>Amount Paid</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Unit 101</td>
            <td>Jan 1, 2025</td>
            <td>Dec 31, 2025</td>
            <td class="text-success">Paid</td>
            <td>₱60,000</td>
          </tr>
          <tr>
            <td>Unit 102</td>
            <td>Jan 1, 2024</td>
            <td>Dec 31, 2024</td>
            <td class="text-success">Paid</td>
            <td>₱60,000</td>
          </tr>
          <tr>
            <td>Unit 103</td>
            <td>Jan 1, 2023</td>
            <td>Dec 31, 2023</td>
            <td class="text-danger">Unpaid</td>
            <td>₱60,000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
