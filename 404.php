<?php
include_once 'Helper/inital.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>404 - Page Not Found | <?= STORE_NAME; ?></title>
</head>
<body>
    <div class="nav-contect">
        <nav class="navbar bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="<?= go('index'); ?>">
                    <div class="text-white" id="logo"><?= STORE_NAME; ?></div>
                </a>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="<?= go('index'); ?>">Home</a>
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
        <div class="text-center d-flex justify-content-center align-items-center vh-100">
            <div class="nav-body">
                <h1 class="display-1 fw-bold text-warning">404</h1>
                <h2 class="text-white mb-4">Page Not Found</h2>
                <p class="text-white-50 mb-4">The page you're looking for doesn't exist or has been moved.</p>
                <a href="<?= go('index'); ?>" class="btn btn-warning px-4 py-2 rounded-4">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3 fixed-bottom">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> <?= STORE_NAME; ?>. All Rights Reserved.</p>
            <p>Designed with ❤️ by <?= STORE_NAME; ?> Team</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
