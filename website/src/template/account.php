<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .menu-item {
      display: flex;
      align-items: center;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 0.5rem;
      transition: all 0.2s ease-in-out;
      text-decoration: none;
      color: #212529;
    }

    .menu-item:hover {
      background-color: #f8f9fa;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-decoration: none;
    }

    .menu-icon {
      margin-right: 10px;
      font-size: 1.5rem;
      color: #0d6efd;
    }

    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
    }

    .logout-btn-container {
      text-align: right;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-body">
        <!-- Intestazione -->
        <div class="d-flex justify-content-between">
            <h2 class="mb-3">Welcome TURBO</h2>
            <a href="../index.php" class="btn-close" aria-label="Close"></a>
        </div>
        <p class="text-muted">jacopo.turchi12@gmail.com</p>

        <!-- Voci del menu -->
        <div class="d-grid gap-3">
          <a href="./form-personal-information.php" class="menu-item">
            <i class="menu-icon bi bi-person"></i>
            Personal Information
          </a>
          <a href="./orders.php" class="menu-item">
            <i class="menu-icon bi bi-receipt"></i>
            My Orders
          </a>
          <a href="#" class="menu-item">
            <i class="menu-icon bi bi-cart"></i>
            Shopping Cart
          </a>
          <a href="#" class="menu-item">
            <i class="menu-icon bi bi-bell"></i>
            Notifications
          </a>
          <a href="#" class="menu-item">
            <i class="menu-icon bi bi-credit-card"></i>
            Payment Methods
          </a>
        </div>

        <!-- Pulsante Logout -->
        <div class="logout-btn-container mt-3">
          <a href="../index.php" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
