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
            <!-- Shopping cart -->
            <div class="d-flex">
                <div class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="resources/cart.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                    </a>
                </div>
                <!-- Profile -->
                <!-- TODO: quando un utente non è loggato deve essere un dropdown -->
                <div class="nav-item">
                    <button class="btn btn-link" data-bs-toggle="offcanvas" data-bs-target="#accountOffcanvas" aria-controls="accountOffcanvas">
                        <img src="resources/profile.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                    </button>
                </div>
            </div>
            <!-- Expansion -->
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
    <div class="container-fluid position-absolute justify-content-center w-100 mt-2">
        <form class="d-flex justify-content-center w-100">
            <input class="form-control me-2 w-50" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
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