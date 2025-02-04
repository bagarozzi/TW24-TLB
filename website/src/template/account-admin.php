    <div class="container mt-5">
        <h1 class="text-center">Admin Dashboard</h1>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <h3>Add Category</h3>
                <form action="./admin.php" method="post">
                    <?php if (isset($templateParams["categoryResult"])): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo $templateParams["categoryResult"]; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required />
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>

            <div class="col-md-4 mt-4">
                <h3>Add Product</h3>
                <form action="./admin.php" method="POST" enctype="multipart/form-data">
                    <?php if (isset($templateParams["productResult"])): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo $templateParams["productResult"]; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" placeholder="Write the name of the product" required />
                    </div>
                    <div class="mb-3">
                        <label for="productCategory" class="form-label">Category</label>
                        <select class="form-select" id="productCategory" name="productCategory" required>
                            <option value="" disabled selected>Select a category</option>
                            <?php foreach ($templateParams["categories"] as $category): ?>
                                <option value="<?php echo $category["name"]; ?>"><?php echo $category["name"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="0,00€" required />
                    </div>
                    <div class="mb-3">
                        <label for="productQuantity" class="form-label">Quantity</label>
                        <input type="number" step="0.01" class="form-control" id="productQuantity" name="productQuantity" placeholder="0" required />
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Description</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" placeholder="Insert details and characteristics." rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="productImage" name="productImage" required />
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>

            <div class="col-md-4 mt-4">
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
                                <form method="POST" action="./admin.php" class="d-flex justify-content-around">
                                    <input type="hidden" name="action" value="order-operation"/>

                                    <input type="number" class="visually-hidden" name="order-id" value="<?php echo $order["riferimento"] ?>"/>

                                    <a href="./order-detail.php?ordernum=<?php echo $order["riferimento"] ?>" class="btn btn-primary">View</a>

                                    <button type="submit" <?php if($order["stato"] == "consegnato") echo "disabled";?> name="change-order-state" value="" class="btn btn-warning mx-2">
                                        <?php if($order["stato"] == "confermato") echo "Ship"; else echo "Close"?>
                                    </button>

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
