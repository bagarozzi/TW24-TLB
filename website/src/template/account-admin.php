<!-- Offcanvas Admin Account -->
<div class="offcanvas offcanvas-end offcanvas-account" tabindex="-1" id="offcanvas-admin">
    <div class="card">
        <div class="card-body d-flex justify-content-between flex-column h-100">
            <!-- Intestazione -->
            <div class="d-flex justify-content-between mb-3">
                <h2 class="fs-4">Welcome Admin <?php echo $_SESSION["username"]; ?></h2>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- Voci del menu -->
            <div class="d-grid gap-3">
                <a href="./admin-product-insertion.php" class="menu-item d-flex align-items-center p-10 border text-decoration-none text-dark rounded p-2">
                    <em class="menu-icon bi bi-box-seam"></em>
                    Insert Product
                </a>
                <a href="./admin-orders.php" class="menu-item d-flex align-items-center p-10 border text-decoration-none text-dark rounded p-2">
                    <em class="menu-icon bi bi-receipt"></em>
                    Manage Orders
                </a>
                <a href="./notifications.php" class="menu-item d-flex align-items-center p-10 border text-decoration-none text-dark rounded p-2">
                    <em class="menu-icon bi bi-bell"></em>
                    Notifications
                </a>
            </div>
            <!-- Pulsante Logout -->
            <div class="logout-btn-container mt-3 text-end">
                <a href="./logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>