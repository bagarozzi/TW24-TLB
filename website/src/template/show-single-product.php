<div class="container-fluid d-flex justify-content-center align-items-center pt-5">
    <div class="card justify-content-center align-items-center shadow h-100 w-100">
        <img src="<?php echo $templateParams["product"]["immagine"] ?>" class="card-img-top pt-2 px-2" alt="John Deere 6R-175">
        <div class="card-body d-flex flex-column justify-content-between">
            <h3 class="card-title"><?php echo $templateParams["product"]["nome"] ?></h3>
            <h4 class="text-success"><?php echo $templateParams["product"]["prezzo"] ?>€</h4>
            <p class="card-text"><?php echo $templateParams["product"]["descrizione"] ?></p> <!-- Descrizione del prodotto -->
            <form action="<?php echo (isUserLoggedIn()) ? $_SERVER["PHP_SELF"] . '?' . $_SERVER['QUERY_STRING'] : "./login.php"?>" method="post">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantità</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="<?php echo $templateParams["product"]["disponibilita"]; ?>" value="1" required>
                </div>
                <button type="submit" id="add-cart" name="action" class="btn btn-dark mt-3 w-100">Add to cart</button>' ;
            </form>
        </div>
    </div>
</div>