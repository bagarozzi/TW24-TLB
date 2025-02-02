<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-body">
        <h2 class="mb-4">Orders</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Date</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>3</td>
              <td>26/01/2025</td>
              <td>24€</td>
              <td><a href="./order-detail.php" class="btn btn-primary btn-sm">View</a></td>
            </tr>
            <tr>
              <td>2</td>
              <td>26/01/2025</td>
              <td>32€</td>
              <td><a href="./order-detail.php" class="btn btn-primary btn-sm">View</a></td>
            </tr>
          </tbody>
        </table>
        <a href="./index.php" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
