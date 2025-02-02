<!-- Offcanvas Account -->
<div class="offcanvas offcanvas-end offcanvas-account" tabindex="-1" id="offcanvas">
    <div class="card">
        <div class="card-body d-flex justify-content-between flex-column h-100">
            <!-- Intestazione -->
            <div class="d-flex justify-content-between">
                <h2 class="mb-3">Welcome TURBO</h2>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- Voci del menu -->
            <div class="d-grid gap-3">
                <a href="./form-personal-information.php" class="menu-item d-flex align-items-center p-10 border text-decoration-none text-dark rounded p-2">
                    <i class="menu-icon bi bi-person"></i>
                    Personal Information
                </a>
                <a href="./orders.php" class="menu-item d-flex align-items-center p-10 border text-decoration-none text-dark rounded p-2">
                    <i class="menu-icon bi bi-receipt"></i>
                    My Orders
                </a>
                <a href="./cart.php" class="menu-item d-flex align-items-center p-10 border text-decoration-none text-dark rounded p-2">
                    <i class="menu-icon bi bi-cart"></i>
                    Shopping Cart
                </a>
                <a href="#" class="menu-item d-flex align-items-center p-10 border text-decoration-none text-dark rounded p-2">
                    <i class="menu-icon bi bi-bell"></i>
                    Notifications
                </a>
            </div>
            <!-- Pulsante Logout -->
            <div class="logout-btn-container mt-3 text-end">
                <a href="./index.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
