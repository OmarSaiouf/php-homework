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
    <title>store</title>
</head>

<body>
    <h1>Welcome to the Store</h1>
    <p>This is a simple store page.</p>
    <a href="login.php">login</a><br>
    <a href="register.php">register</a>
    <hr>

    <?php
    if (!empty($data['products'])):
        foreach ($data['products'] as $e):
    ?>
            <div><?= $e['name']; ?></div>

        <?php
        endforeach;
    else:
        ?>
        <h1>not found products</h1>
    <?php
    endif;
    ?>
</body>

</html>