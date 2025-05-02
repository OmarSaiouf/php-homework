<?php
include_once 'Helper/inital.php';
include_once "Controllers/register_controller.php";

register_controller();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <title><?= STORE_NAME; ?> store</title>
</head>

<body>
    <div class="nav-contect">
        <nav class="navbar bg-transparent">
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
        <div class="text-center d-flex justify-content-center align-items-center vh-100">

            <div class="nav-body">
                <h1>Delicious Seasonal Fruits</h1>
                <ul>
                    <a href="#register">
                        <li class="btn btn-warning p-2 m-3 rounded-4 text-white">Register</li>
                    </a>
                    <a href="index.php">
                        <li class="btn btn-outline-warning m-3 pr-3 pl-3 rounded-4 text-white">Fruit Collection</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>

    <div class="container justify-content-center text-center align-items-center d-flex">
        <div class=" mt-5">
            <div class="card product-card text-center p-3">
                <div id="products" class="section-title text-center mt-2">
                    <h3><span id="register" class="text-warning">Register</span></h3>
                    <div class="hr"></div>
                    <p>Create your account to enjoy the freshest and most delicious fruits delivered right to your doorstep.</p>
                </div>
                <div class="container card-body">
                    <form method="POST">
                        <div class="mb-3 text-start">
                            <label for="username" class="form-label ">Username</label>
                            <input type="username" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label ">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning text-white w-100">register</button>
                        <div class="mt-3">
                            <p>Already have an account? <a href="login.php" class="text-warning">Login here</a>.</p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-1 mt-4">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> <?= STORE_NAME; ?>. All Rights Reserved.</p>
            <p>Designed with ❤️ by <?= STORE_NAME; ?> Team</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>