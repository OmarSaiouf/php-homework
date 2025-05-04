<?php
include_once 'Helper/methods/requset.php';
include_once "config.php";
if (isset(request()['errors'])) {
    $errors = json_decode(urldecode(request()['errors']), 1);
} else {
    go('index', null, false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Error</title>
</head>

<body>
    <div class="nav-contect">
        <nav class="navbar bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <div class="text-white" id="logo">omar</div>
                </a>
                <ul class="nav justify-content-center ">
                    <li class="nav-item">

                    </li>

                </ul>
            </div>
        </nav>
        <div class="text-center d-flex justify-content-center align-items-center">

            <div class="nav-body">
                <h1>error</h1>
                <div class="card product-card text-center">
                    <div class="card-body">
                        <?php
                        // print_r($errors);
                        foreach ($errors as $key => $value) {
                            echo "<p>$key : $value</p>";
                        }
                        ?>
                    </div>
                    <a href="index.php" class="btn btn-warning w-100">go to Home</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; <?= date('Y'); ?> . All Rights Reserved.</p>

        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>