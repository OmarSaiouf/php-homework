<?php

function request(): array
{
    $data = [];
    if (isset($_POST)) {
        $data = array_merge($data, $_POST);
    }
    if (isset($_GET)) {
        $data = array_merge($data, $_GET);
    }
    if (isset($_FILES)) {
        $data = array_merge($data, $_FILES);
    }
    if (isset($_SERVER['REQUEST_METHOD'])) {

        if ($_SERVER['REQUEST_METHOD'] === 'PUT' || $_SERVER['REQUEST_METHOD'] === 'PATCH') {
            parse_str(file_get_contents("php://input"), $putData);
            if ($putData) {
                $data = array_merge($data, $putData);
            }
        }
    }
    return $data;
}

function go($url, $arg = null, $return = true)
{

    $url = URL . '/' . $url;
    $urlParts = explode(".", $url);
    if (end($urlParts) != 'php') {
        $url .= '.php';
    }
    if ($arg) {
        $query = http_build_query($arg);
        if (!empty($query)) {
            $url .= (strpos($url, '?') === false ? '?' : '&') . $query;
        }
    }
    if ($return) {
        return $url;
    } else {
        echo "<script>window.location.href='" . htmlspecialchars($url) . "';</script>";
        exit;
    }
}


function upload_image($image, $storage_name)
{
    if (!isset($image['tmp_name']) || !is_uploaded_file($image['tmp_name'])) {
        return ['ok' => false, 'message' => 'Invalid image file'];
    }
    $uploadDir = __DIR__ . "../../../" . BASE_STORAGE . "/" . $storage_name . "/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $fileName = uniqid() . '_' . basename($image['name']);
    $uploadPath = $uploadDir . $fileName;

    if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
        return ['ok' => true, 'message' => 'Image uploaded successfully', 'path' => $uploadPath, 'name' => $storage_name . "/" . $fileName];
    } else {
        return ['ok' => false, 'message' => 'Failed upload image'];
    }
}
