<?php


function product_controller()
{
    $request = request();
    if (!isset($request['id'])) {
        go('404', null, false);
    }
    $product = Product::get_data_by_id($request['id']);
    if (isset($product[0])) {
        return $product[0];
    } else {
        go('404', null, false);
    }
}
