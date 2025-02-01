<?php
require_once 'bootstrap.php';
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Il tuo sito</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/cart.css">
    </head>
    <body>
        <?php require 'template/header.php';?>
        <main>
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Trattore</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Quantità: 2</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Trattore</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Quantità: 2</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Trattore</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Quantità: 2</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    <div class="card w-100">
                        <div class="card-body">
                            <h5 class="card-title">Trattore</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Quantità: 2</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column justify-content-center">
                    <h2>Order summary</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Estimated cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Trattore
                                </td>
                                <td>
                                    1000
                                </td>
                            </tr>
                                <td>
                                    Trattore
                                </td>
                                <td>
                                    500
                                </td>
                            </tr>
                            <tr>
                                <td>Shipping costs</td>
                                <td>100€</td>
                            </tr>
                            <tr>
                                <td>Taxes</td>
                                <td>1600€</td>
                            </tr>
                        </tbody>
                        <tfoot class="border-top-2">
                            <tr class="fw-bold fs-5">
                                <td>Total</td>
                                <td>3200€</td>
                            </tr>
                        </tfoot>
                    </table> 
                </div>
            </div>
        </main>
        <?php require 'template/footer.php';?>
    </body>    
</html>