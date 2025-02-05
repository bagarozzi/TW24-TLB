<div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-body">
        <h2 class="mb-4">Orders</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Date</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($templateParams["orders"] as $order):?>
            <tr>
              <td><?php echo $order["riferimento"] ?></td>
              <td><?php echo $order["data"] ?></td>
              <td><?php echo $order["totale"] ?>€</td>
              <td><a href="./order-detail.php?ordernum=<?php echo $order["riferimento"] ?>" class="btn btn-primary btn-sm">View</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <a href="./index.php" class="btn btn-secondary">Home</a>
      </div>
    </div>
  </div>