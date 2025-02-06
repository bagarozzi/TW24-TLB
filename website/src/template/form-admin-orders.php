<div class="container mt-5">
    <h1 class="text-center">Admin Orders</h1>
    <div class="row mt-4">
        <div class="col-md-4 mt-4 offset-md-4">
            <h3>View Orders</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total products</th>
                        <th>State</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($templateParams["orders"] as $order): ?>
                    <tr>
                        <td><?php echo $order["riferimento"] ?></td>
                        <td><?php echo $order["email"] ?></td>
                        <td><?php echo $order["totale"] ?></td>
                        <td><?php if($order["stato"] == "confermato") echo "Confirmed"; else if($order["stato"] == "spedito") echo "Shipped"; else echo "Delivered"; ?></td>
                        <td>
                            <form method="POST" action="./admin-orders.php" class="d-flex justify-content-around">
                                <input type="hidden" name="action" value="order-operation"/>

                                <input type="number" class="visually-hidden" name="order-id" value="<?php echo $order["riferimento"] ?>"/>

                                <a href="./order-detail.php?ordernum=<?php echo $order["riferimento"] ?>" class="btn btn-primary">View</a>
                                <label for="change-order-state" class="visually-hidden">Change the state of the order from <?php if($order["stato"] == "confermato") echo "Confirmed"; else if($order["stato"] == "spedito") echo "Shipped"; else echo "Delivered"; ?> to <?php if($order["stato"] == "confermato") echo "Shipped"; else echo "Delivered"?></label>
                                <button type="submit" <?php if($order["stato"] == "consegnato") echo "disabled";?> name="change-order-state" value="" class="btn btn-warning mx-2">
                                    <?php if($order["stato"] == "confermato") echo "Ship"; else echo "Close"?>
                                </button>
                                <label for="delete-order" class="visually-hidden">Delete the order</label>
                                <button type="submit" name="delete-order" value="" class="btn btn-danger">Delete</button>
                            </form>                         
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
