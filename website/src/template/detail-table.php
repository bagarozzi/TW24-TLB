<div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-body">
        <h2 class="mb-4">Order Detail: #<?php echo $templateParams["orderNumber"] ?></h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($templateParams["orderDetails"] as $item): ?>
            <tr>
              <td><?php echo $item["nome"] ?></td>
              <td><?php echo $item["prezzo"] ?></td>
              <td><?php echo $item["quantita"] ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <a href="<?php if(isAdminLoggedIn()) echo "./admin-orders.php"; else if(isUserLoggedIn()) echo "./orders.php"; ?>" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>