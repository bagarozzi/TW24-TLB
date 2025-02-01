
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
                        <a class="nav-link" href="./template/account.php">
                            <img src="resources/profile.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                        </a>
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
        <div class="container-fluid position-absolute justify-content-center w-100">
            <form class="form-inline">
                <div class="form-group d-flex row justify-content-center align-items-center">
                    <input type="text" class="form-control w-50 d-inline" id="inputPassword2" placeholder="search the HarvestHub">
                    <button type="submit" class="btn btn-primary w-25 d-inline col-rounded-circle mb-2"><img src="resources/search.png" alt="" width="20" height="20" class="d-inline-block align-text-top"></button>
                </div>
            </form>
        </div>
    </header>