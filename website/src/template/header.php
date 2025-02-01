<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HarvestHub</title>
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
            color: #212529;
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
    <!-- Header -->
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between">
                <!-- Hamburger menu -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand" href="#">
                    <img src="resources/logoat.jpg" alt="" width="60" height="60" class="d-inline-block align-text-center">
                    HarvestHub
                </a>
                <!-- Shopping cart & Profile -->
                <div class="d-flex">
                    <div class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="resources/cart.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                        </a>
                    </div>
                    <div class="nav-item">
                        <!-- Profile button triggers Offcanvas -->
                        <button class="btn btn-link" data-bs-toggle="offcanvas" data-bs-target="#accountOffcanvas" aria-controls="accountOffcanvas">
                            <img src="resources/profile.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                        </button>
                    </div>
                </div>
                <!-- Expanded Navbar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Search Bar -->
        <div class="container-fluid position-relative justify-content-center w-100 mt-3">
            <form class="form-inline">
                <div class="form-group d-flex row justify-content-center align-items-center">
                    <input type="text" class="form-control w-50 d-inline" id="searchBar" placeholder="Search the HarvestHub">
                    <button type="submit" class="btn btn-primary w-25 d-inline col-rounded-circle mb-2">
                        <img src="resources/search.png" alt="" width="20" height="20" class="d-inline-block align-text-top">
                    </button>
                </div>
            </form>
        </div>
    </header>

    <!-- Offcanvas Account -->
    <div class="offcanvas offcanvas-end offcanvas-account" tabindex="-1" id="accountOffcanvas">
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="d-flex justify-content-between">
                    <h2 class="mb-3">Welcome TURBO</h2>
                    <a href="#" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></a>
                </div>
                <p class="text-muted">jacopo.turchi12@gmail.com</p>
                <!-- Menu Items -->
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
                <!-- Logout Button -->
                <div class="logout-btn-container mt-3">
                    <a href="../index.php" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
