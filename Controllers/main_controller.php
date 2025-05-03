<?php


function main_controller()
{
    // if (checkAuth()) {
    //     go('products', null, false);
    //     exit;
    // }
    $products = Product::get_all_data();

    return [
        'products' => $products
    ];
}
