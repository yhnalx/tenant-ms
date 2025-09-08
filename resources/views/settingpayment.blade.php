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
      <h3 class="fw-bold mb-4">Payment Settings</h3>

      <!-- Back Button -->
      <a href="setting" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left me-2"></i> Back to Settings
      </a>

      <!-- Add Payment Method Form -->
      <div class="card p-3 mb-4 shadow-sm">
        <h5>Add Payment Method</h5>
        <form>
          <div class="mb-3">
            <label class="form-label">Method Name</label>
            <input type="text" class="form-control" placeholder="e.g. GCash, Bank Transfer">
          </div>
          <div class="mb-3">
            <label class="form-label">Account / Number</label>
            <input type="text" class="form-control" placeholder="e.g. 0917xxxxxxx">
          </div>
          <div class="mb-3">
            <label class="form-label">Upload QR Code</label>
            <input type="file" class="form-control">
          </div>
          <button class="btn btn-primary">Save</button>
        </form>
      </div>

      <!-- List of Payment Methods -->
      <div class="card p-3 shadow-sm">
        <h5>Existing Payment Methods</h5>
        <table class="table">
          <thead>
            <tr>
              <th>Method</th>
              <th>Account</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>GCash</td>
              <td>09171234567</td>
              <td><span class="badge bg-success">Active</span></td>
              <td>
                <button class="btn btn-sm btn-warning">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </html>