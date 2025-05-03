<?php
include_once 'Helper/inital.php';
include_once 'Controllers/products_controller.php';

$products = products_controller();
// echo '<pre>';
// print_r($products);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>products</title>
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>products</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproductModal">
                <i class="bi bi-plus-lg"></i> Add product
            </button>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>

                        <td><img src="<?= storage($product['image']) ?>" alt="product" width="60" height="60"></td>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['product_name'] ?></td>
                        <td>$<?= $product['price'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editproductModal<?= $product['id'] ?>">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteproductModal<?= $product['id'] ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <div class="modal fade" id="editproductModal<?= $product['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                        <input type="hidden" name="method" value="edit">
                                        <div class="mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" class="form-control" name="product_name" value="<?= $product['product_name'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number" class="form-control" name="price" value="<?= $product['price'] ?>" step="0.01">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="description"><?= $product['description'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Image</label>
                                            <img src="<?= storage($product['image']) ?>" alt="product" width="60" height="60" class="d-block mb-2">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteproductModal<?= $product['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete <?= $product['product_name']."   ".$product['id'] ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form id="deleteproductForm" method="post">
                                        <input type="hidden" name="method" value="delete">
                                        <input type="hidden" name="id" value="<?= $product['id'] ?>">

                                        <a onclick="document.getElementById('deleteproductForm').submit()" class="btn btn-danger">Delete</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addproductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="method" value="add">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>