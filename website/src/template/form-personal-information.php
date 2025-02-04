<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-body">
      <h2 class="mb-4">Personal Information</h2>
      <form action="#" method="POST">
        <?php if (isset($templateParams["result"])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $templateParams["result"]; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name" value="<?php echo $_SESSION["name"]; ?>" required/>
        </div>
        <div class="mb-3">
          <label for="surname" class="form-label">Surname</label>
          <input type="text" name="surname" class="form-control" id="surname" value="<?php echo $_SESSION["surname"]; ?>" required/>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" readonly class="form-control" id="email" value="<?php echo $_SESSION["email"]; ?>" required/>
        </div>
        <div class="mb-3">
          <label for="birthdate" class="form-label">Birthdate</label>
          <input type="date" name="birthday" class="form-control" id="birthdate" value="<?php echo $_SESSION["birthday"]; ?>" required/>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">New Password</label>
          <input type="password" name="password" class="form-control" id="password"/>
        </div>
        <div class="mb-3">
          <label for="confirm-password" class="form-label">Confirm Password</label>
          <input type="password" name="confirm-password" class="form-control" id="confirm-password"/>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <button type="submit" name="submit" class="btn btn-success">Save</button>
          <a href="./index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>