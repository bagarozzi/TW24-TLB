<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between">
            <!-- Hamburger menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand" href="./index.php">
            <img src="resources/logoat.jpg" alt="" width="60" height="60" class="d-inline-block align-text-center">
            HarvestHub
            </a>
            <!-- Shopping cart -->
            <div class="d-flex">
                <div class="nav-item">
                    <a class="nav-link" href="./cart.php">
                        <img src="resources/cart.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                    </a>
                </div>
                <!-- Profile -->
                <!-- TODO: quando un utente non è loggato deve essere un dropdown -->
                <div class="nav-item">
                    <button class="btn btn-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
                        <img src="resources/profile.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                    </button>
                </div>
            </div>
            <!-- Expansion -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./products.php">Products</a>
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
    <?php 
        if(isset($templateParams["includeSearchbar"]) && $templateParams["includeSearchbar"] == true) {
            echo '<div class="container-fluid position-absolute justify-content-center w-100 mt-2">
                    <form class="d-flex justify-content-center w-100">
                        <input class="form-control me-2 w-50" type="search" placeholder="Search" aria-label="Search"/>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                  </div>';
        }
    ?>
</header>
