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
      <h3 class="fw-bold mb-4">Team Management</h3>

      <!-- Back Button -->
      <a href="setting" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left me-2"></i> Back to Settings
      </a>

      <!-- Add Staff -->
      <div class="card p-3 mb-4 shadow-sm">
        <h5>Add New Staff</h5>
        <form>
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Staff Name">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Staff Email">
          </div>
          <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-select">
              <option>Manager</option>
              <option>Assistant</option>
              <option>Maintenance</option>
            </select>
          </div>
          <button class="btn btn-primary">Add Staff</button>
        </form>
      </div>

      <!-- Staff List -->
      <div class="card p-3 shadow-sm">
        <h5>Existing Staff</h5>
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Juan Dela Cruz</td>
              <td>juan@example.com</td>
              <td>Assistant</td>
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
  </div>
</html>