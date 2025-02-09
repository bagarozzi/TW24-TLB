
<header>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between">
            <!-- Hamburger menu -->
            <label for="navbar-toggler" class="visually-hidden">Toggle the navigation bar.</label>
            <button id="navbar-toggler" class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" name="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand" href="./index.php">
                <img src="resources/logoat.png" alt="HarvestHub Logo" width="60" height="60" class="d-inline-block align-text-center">
                HarvestHub
            </a>
            <!-- Shopping cart -->
            <div class="d-flex">
                <?php
                if (isAdminLoggedIn()) {
                    //do not visualise cart
                } elseif(isUserLoggedIn()) {
                    echo '<div class="nav-item">
                            <a class="nav-link" href="./cart.php">
                                <img src="resources/cart.png" alt="Shopping cart" width="30" height="30" class="d-inline-block align-text-top">
                            </a>
                        </div>';
                } else { //not logged in
                    echo '<div class="nav-item">
                            <a class="nav-link" href="./login.php">
                                <img src="resources/cart.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                            </a>
                        </div>';
                }
                ?>
                
                <!-- Profile -->
                <div class="nav-item">
                    <?php
                    if (isUserLoggedIn()) {
                        echo '<button class="btn btn-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-user" aria-controls="offcanvas-user">
                                <img src="resources/profile.png" alt="Profile" width="30" height="30" class="d-inline-block align-text-top">
                            </button>';
                    } elseif (isAdminLoggedIn()) {
                        echo '<button class="btn btn-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-admin" aria-controls="offcanvas-admin">
                                <img src="resources/profile.png" alt="Profile" width="30" height="30" class="d-inline-block align-text-top">
                            </button>';
                    } else { //not logged in
                        echo '<a class="nav-link" href="./login.php">
                                <img src="resources/profile.png" alt="Profile" width="30" height="30" class="d-inline-block align-text-top">
                            </a>';
                    }
                    ?>
                </div>
            </div>
            <!-- Expansion -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.php">About us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php 
        if(isset($templateParams["includeSearchbar"]) && $templateParams["includeSearchbar"] == true) {
            echo '<div class="container-fluid position-absolute justify-content-center w-100 mt-2" style="z-index: 10;">
                    <form  id="searchForm" class="d-flex justify-content-center w-100">
                        <label for="searchInput" class="visually-hidden">search bar</label>
                        <input  id="searchInput" class="form-control me-2 w-50" type="search" placeholder="" aria-label="Search" name="searchBar"/>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                  </div>';
            echo '<script src = "js/search.js"></script>';
        }
    ?>
</header>
