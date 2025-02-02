<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-body">
      <h2 class="mb-4">Personal Information</h2>
      <form action="./index.php" method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" value="Jacopo"/>
        </div>
        <div class="mb-3">
          <label for="surname" class="form-label">Surname</label>
          <input type="text" class="form-control" id="surname" value="Turchi"/>
        </div>
        <div class="mb-3">
          <label for="staticEmail" class="form-label">Email</label>
          <input type="text" readonly class="form-control" id="staticEmail" value="jacopo.turchi12@gmail.com"/>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="phone" value="3334445566"/>
        </div>
        <div class="mb-3">
          <label for="birthdate" class="form-label">Birthdate</label>
          <input type="date" class="form-control" id="birthdate" value="2003-08-08"/>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">New Password</label>
          <input type="password" class="form-control" id="password"/>
        </div>
        <div class="mb-3">
          <label for="confirm-password" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirm-password"/>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="./index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>