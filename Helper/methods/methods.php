<?php


function random_float($min, $max, $decimals = 2)
{
    $scale = pow(10, $decimals);
    return mt_rand($min * $scale, $max * $scale) / $scale;
}

function storage($path)
{
    if (!empty($path) || $path != '') {
        return URL . "/" . BASE_STORAGE . "/" . $path;
    } else {

        return URL . "/" . BASE_STORAGE . "/image.png";
    }
}

function get_session($key)
{
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    }
    if (isset($_COOKIE[$key])) {
        return json_decode($_COOKIE[$key], true);
    }
    return null;
}

function add_session($key, $value)
{
    if (!headers_sent() && is_writable(session_save_path())) {
        setcookie($key, json_encode($value), time() + (30), '/');
    } else {
        $_SESSION[$key] = $value;
    }
}


function delete_session($key)
{
    if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
    }
    if (isset($_COOKIE[$key])) {
        setcookie($key, '', time() - 3600, '/');
    }
}


function alert($message)
{
    echo <<< h
<div class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x text-center mt-3 px-5 shadow" role="alert" style="z-index: 1055; max-width: 500px;">
 $message
  <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
h;
}
