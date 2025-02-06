<div class="container mt-5">
    <h2 class="text-center">Admin Dashboard</h2>
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <h3>Manage Categories</h3>
            <form action="./admin-product-insertion.php" method="post">
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
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary px-2" name="action" value="add" style="flex: 1; margin-right: 1%;">Add</button>
                    <button type="button" class="btn btn-warning px-2" id="editCategoryButton" style="flex: 1; margin-right: 1%;">Edit</button>
                    <button type="submit" class="btn btn-danger px-2" name="action" value="delete" style="flex: 1;">Delete</button>
                </div>
                <div id="editCategoryForm" style="display: none;" class="mt-3">
                    <div class="mb-3">
                        <label for="newCategoryName" class="form-label">New Category Name</label>
                        <input type="text" class="form-control" id="newCategoryName" name="newCategoryName" placeholder="Enter new category name" />
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success" name="action" value="save">Save</button>
                        <button type="button" class="btn btn-danger" id="cancelEditButton">Cancel</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-8 offset-md-2 mt-4">
            <h3>Add Product</h3>
            <form action="./admin-product-insertion.php" method="POST" enctype="multipart/form-data">
                <?php if (isset($templateParams["productResult"])): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $templateParams["productResult"]; ?>
                        <label for="close" class="visually-hidden">Close the section.</label>
                        <button type="button" name="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                <button type="submit" class="btn btn-primary mb-4">Add Product</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src = "js/category.js"></script>