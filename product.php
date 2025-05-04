<?php
include_once 'Helper/inital.php';
include_once 'Controllers/product_controller.php';
$data = product_controller();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?= $data['product_name'] ?? 'Product' ?> - <?= STORE_NAME ?></title>
</head>

<body>
    <nav class="navbar bg-dark">
        <div class="container">

            <a class="navbar-brand" href="<?= go('index'); ?>">
                <div class="text-white" id="logo"> <?= STORE_NAME; ?></div>
            </a>
            <ul class="nav justify-content-center ">
                <li class="nav-item">
                <a class="nav-link text-white" type="button" data-bs-toggle="modal" data-bs-target="#powered_by_alert">Dev</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?= storage($data['image']) ?>" class="img-fluid rounded" alt="<?= $data['product_name'] ?>">
            </div>
            <div class="col-md-6">
                <h1 class="mb-4"><?= $data['product_name'] ?></h1>
                <div class="mb-3">
                    <span class="h3 text-warning">$<?= number_format($data['price'], 2) ?></span>
                </div>
                <p class="lead mb-4"><?= $data['description'] ?></p>

            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> <?= STORE_NAME; ?>. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>