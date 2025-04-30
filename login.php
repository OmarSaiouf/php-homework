<?php
include_once 'Helper/inital.php';

if (checkAuth()) {
    go('products', null, false);
}
