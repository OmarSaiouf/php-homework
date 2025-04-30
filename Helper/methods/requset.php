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
    if (isset($_COOKIE)) {
        $data = array_merge($data, $_COOKIE);
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
    $url = DOMIN  . $url;
    $query = http_build_query($arg);
    $urlParts = explode(".", $url);
    if (end($urlParts) != 'php') {
        $url .= '.php';
    }
    if (!empty($query)) {
        $url .= (strpos($url, '?') === false ? '?' : '&') . $query;
    }
    if ($return) {
        return $url;
    } else {

        if (!headers_sent()) {
            header("Location: $url");
            exit;
        } else {
            echo "<script>window.location.href='" . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . "';</script>";
            exit;
        }
    }
}
