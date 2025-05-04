<?php
include_once 'Helper/inital.php';
include_once 'Controllers/main_controller.php';

$data = main_controller();

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
                        <?php if (checkAuth()) { ?>
                            <a class="nav-link text-white" href="products.php">Products</a>
                        <?php } else { ?>
                            <a class="nav-link text-white" href="register.php">Register</a>
                        <?php } ?>
                    </li>
                    <li class="nav-item">
                        <?php if (checkAuth()) { ?>
                            <a class="nav-link text-warning" href="login.php">Logout</a>
                        <?php } else { ?>
                            <a class="nav-link text-white" href="login.php">Login</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="text-center d-flex justify-content-center align-items-center vh-100">

            <div class="nav-body">
                <h1>Delicious Seasonal Fruits</h1>
                <ul>
                    <a href="#products">
                        <li class="btn btn-warning p-2 m-3 rounded-5 text-white">Fruit Collection</li>
                    </a>
                    <a href="register.php">
                        <li class="btn btn-outline-warning m-3 pr-3 pl-3 rounded-4 text-white">join</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
    <div class="container ">
        <div id="products" class="section-title text-center mt-5">
            <h3><span class="text-warning">Our</span> Products</h3>
            <div class="hr"></div>
            <p>Fresh, juicy, and bursting with flavor, our fruits are nature's sweetest gift to your taste buds.</p>
        </div>
        <div class="text-center align-items-center row g-3 mt-5">
            <?php
            if (!empty($data['products'])):
                foreach ($data['products'] as $product):
            ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <a class="text-decoration-none text-dark" href="<?= go('product', ['id' => $product['id']]) ?>">
                            <div class="card product-card text-center p-3">
                                <img src="<?= storage($product['image']) ?>" class="card-img-top product-image mx-auto" alt="<?= $product['product_name'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?= $product['product_name'] ?></h5>
                                    <p class="text-muted mb-2"><?= $product['description'] ?></p>
                                    <div class="price mb-3"><?= $product['price'] ?>$</div>
                                    <a href="#" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">Add to cart</a>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php
                endforeach;
            else:
                ?>
                <div class="w-100 text-center py-5 my-5">
                    <h1>No Products Found</h1>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">لاتزعل:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    نصيبك بالجنة
                </div>

            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> <?= STORE_NAME; ?>. All Rights Reserved.</p>
            <p>Designed with ❤️ by <?= STORE_NAME; ?> Team</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>