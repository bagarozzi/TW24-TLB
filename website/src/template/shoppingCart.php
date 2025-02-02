
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
                    <?php foreach($templateParams["shoppingCart"] as $item): ?>
                    <div class="card w-100 my-2">
                        <div class="card-body d-flex justify-content-center">
                            <div class="col d-flex flex-column flex-md-row align-items-center justify-content-center">
                                <img src="<?php echo $item["immagine"] ?>" alt="" style="width: 50%; height: auto;">
                                <div class="d-flex flex-column justify-content-center ms-md-5 mt-3 mt-md-0">
                                    <h5 class="card-title"><?php echo $item["nome"] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["descrizione"] ?></h6>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                            <h5 class="card-title"><?php echo $item["prezzo"] ?> €</h5>
                            </div>
                            <div class="col d-flex flex-column align-items-center justify-content-around">
                                <form class="d-flex justify-content-between align-items-center">
                                    <input type="hidden" name="action" value="update_quantity">
                                    <input type="hidden" name="product_id" value="<?php echo $item["codProdotto"]; ?>">
                                    <button type="submit" name="decrease" class="btn btn-primary rounded-circle">-</button>
                                    <input type="text" name="quantity" class="form-control" value="<?php echo $item["quantita"] ?>"/>
                                    <button type="submit" name="increase" class="btn btn-primary rounded-circle">+</button>
                                </form>
                                <button class="btn btn-danger">Remove item</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
                            <?php foreach($templateParams["shoppingCart"] as $item): ?>
                            <tr>
                                <td>
                                    <?php echo $item["nome"] ?>
                                </td>
                                <td>
                                    <?php echo $item["prezzo"] ?> € x <?php echo $item["quantita"] ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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
                                <td>
                                    <?php 
                                        $total = 0;
                                        foreach($templateParams["shoppingCart"] as $item) {
                                            $total += $item["prezzo"] * $item["quantita"];
                                        }
                                        echo $total + 100 + 1600;
                                    ?>€
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn btn-primary">Checkout</button>
                    </div> 
                </div>
            </div>
