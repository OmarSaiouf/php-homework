<?php


function products_controller()
{
    authMiddleware();
    $request = validations([
        "method" => "required"
    ]);
    if ($request) {
        if ($request['method'] == "delete") {
            $requestData = validations([
                "id" => "required"
            ]);
            print_r($requestData);
            Product::delete_data($requestData['id']);
            go('products', null, false);
        } else if ($request['method'] == "edit") {
            $requestData = validations([
                "id" => "required",
                "product_name" => "required",
                "price" => "",
                "description" => "",
                // "image" => "",

            ]);
            $requestData['image'] = isset($requestData['image']) ? $requestData['image'] : "image.png";
            Product::update_data($requestData['id'], $requestData);
            go('products', null, false);
        } else if ($request['method'] == "add") {
            $requestData = validations([
                "product_name" => "required|where:Product,product_name",
                "price" => "required",
                "description" => "",
                // "image" => "",

            ]);
            $requestData['image'] = isset($requestData['image']) ? $requestData['image'] : "image.png";
            
            Product::insert_data($requestData);
            go('products', null, false);
        }
    }



    return Product::get_all_data();
}
