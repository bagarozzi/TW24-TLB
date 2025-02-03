<div class="container d-flex justify-content-center align-items-center min-vh-50 py-3">
    <div class="card shadow-sm p-4 mx-auto register-card">
        <h2 class="text-center mb-3">Register</h2>
        <form action="#" method="POST">
            <?php if (isset($templateParams["error"])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $templateParams["error"]; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="nome" class="form-label">Name:</label>
                <input type="text" name="nome" id="nome" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label">Surname:</label>
                <input type="text" name="cognome" id="cognome" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="dataNascita" class="form-label">Birthday:</label>
                <input type="date" name="dataNascita" id="dataNascita" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required />
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary clickable">Register</button>
            </div>
        </form>

        <p class="text-center mt-3">
            Already registered? <a href="login.php" class="text-decoration-none">Login</a>
        </p>
    </div>
</div>