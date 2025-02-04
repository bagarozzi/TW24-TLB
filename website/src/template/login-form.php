<div class="container d-flex justify-content-center align-items-center min-vh-50 py-3">
    <div class="card shadow-sm p-4 mx-auto login-card">
        <h2 class="text-center mb-3">Login</h2>
        <form action="#" method="POST">
            <?php if (isset($templateParams["error"])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $templateParams["error"]; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required />
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary clickable">Login</button>
            </div>
        </form>

        <p class="text-center mt-3">
            Don't have an account? <a href="register.php" class="text-decoration-none">Register</a>
        </p>
    </div>
</div>