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
        <script src="js/cart.js"></script>
    </head>
    <body>
        <?php require 'template/header.php';?>
        <main>
            <div class="container-fluid d-flex justify-content-center">
                <h1>Shopping cart</h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 px-5">
                <div class="card w-100 border-0">
                        <div class="card-body d-flex justify-content-center">
                            <div class="col d-flex align-items-center justify-content-center">
                                <h5 class="card-title">Item</h5>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                                <h5 class="card-title">Price</h5>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                                <h5 class="card-title">Quantity</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 my-2">
                        <div class="card-body d-flex justify-content-center">
                            <div class="col d-flex flex-column flex-md-row align-items-center justify-content-center">
                                <img src="resources/tractor.png" alt="" style="width: 50%; height: auto;">
                                <div class="d-flex flex-column justify-content-center ms-md-5 mt-3 mt-md-0">
                                    <h5 class="card-title">John Deere MT-3</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Trattore cingolato</h6>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                            <h5 class="card-title">100.00€</h5>
                            </div>
                            <div class="col d-flex flex-column align-items-center justify-content-around">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary rounded-circle">-</button>
                                    <input type="text" class="form-control" value="2">
                                    <button class="btn btn-primary rounded-circle">+</button>
                                </div>
                                <button class="btn btn-danger">Remove item</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 my-2">
                        <div class="card-body d-flex justify-content-center">
                            <div class="col d-flex flex-column flex-md-row align-items-center justify-content-center">
                                <img src="resources/tractor.png" alt="" style="width: 50%; height: auto;">
                                <div class="d-flex flex-column justify-content-center ms-md-5 mt-3 mt-md-0">
                                    <h5 class="card-title">John Deere MT-3</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Trattore cingolato</h6>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                            <h5 class="card-title">100.00€</h5>
                            </div>
                            <div class="col d-flex flex-column align-items-center justify-content-around">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary rounded-circle">-</button>
                                    <input type="text" class="form-control" value="2">
                                    <button class="btn btn-primary rounded-circle">+</button>
                                </div>
                                <button class="btn btn-danger">Remove item</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 my-2">
                        <div class="card-body d-flex justify-content-center">
                            <div class="col d-flex flex-column flex-md-row align-items-center justify-content-center">
                                <img src="resources/tractor.png" alt="" style="width: 50%; height: auto;">
                                <div class="d-flex flex-column justify-content-center ms-md-5 mt-3 mt-md-0">
                                    <h5 class="card-title">John Deere MT-3</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Trattore cingolato</h6>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                            <h5 class="card-title">100.00€</h5>
                            </div>
                            <div class="col d-flex flex-column align-items-center justify-content-around">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary rounded-circle">-</button>
                                    <input type="text" class="form-control" value="2">
                                    <button class="btn btn-primary rounded-circle">+</button>
                                </div>
                                <button class="btn btn-danger">Remove item</button>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 my-2">
                        <div class="card-body d-flex justify-content-center">
                            <div class="col d-flex flex-column flex-md-row align-items-center justify-content-center">
                                <img src="resources/tractor.png" alt="" style="width: 50%; height: auto;">
                                <div class="d-flex flex-column justify-content-center ms-md-5 mt-3 mt-md-0">
                                    <h5 class="card-title">John Deere MT-3</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Trattore cingolato</h6>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                            <h5 class="card-title">100.00€</h5>
                            </div>
                            <div class="col d-flex flex-column align-items-center justify-content-around">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="btn btn-primary rounded-circle">-</button>
                                    <input type="text" class="form-control" value="2">
                                    <button class="btn btn-primary rounded-circle">+</button>
                                </div>
                                <button class="btn btn-danger">Remove item</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 d-flex flex-column justify-content-start px-5">
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
                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn btn-primary">Checkout</button>
                    </div> 
                </div>
            </div>
        </main>
        <?php require 'template/footer.php';?>
    </body>    
</html>