<div class="container-page">
        <div id="main-content">
    <div class="d-flex justify-content-center align-items-center vh-90">
        <div class="container-fluid text-center px-3">
            <?php if (isUserLoggedIn()): ?>
            <div class="text-center">
                <h1 class="mb-4">Benvenuto, <?= $_SESSION["name"] ?>!</h1>
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            </div>
            <?php else: ?>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <form action="#" method="POST" class="p-4 shadow-sm rounded bg-white">
                        <h2 class="mb-4">Registrazione</h2>
                        <?php endif; ?>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <?php if (isset($register_error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $register_error; ?>
                            </div>
                        <?php endif; ?>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Invia</button>
                    </form>
                    <div class="mt-3">
                        Hai già un account? <a href="login.php">Accedi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>