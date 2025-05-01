<?php
session_start();
include_once 'config.php';
include_once 'database_tools/base_model.php';
include_once 'Models/user.php';
include_once 'Models/product.php';
include_once 'methods/requset.php';
include_once 'methods/methods.php';
include_once 'Middlewares/auth.php';
include_once 'Helper/database_tools/seeder.php';

seeder(User::class, function($i){
    return [
        'username'=>"omar". rand(100,999),
        'email'=> 'example'.rand(100,999).'@gmail.com',
        'role'=>"user"
    ];
}, $for = 10);

seeder(Product::class, function($i){
    $products = [
        [
            'product_name'=>'berry',
            'image'=>'products/berry.png',
            'price'=> random_float(1.0,10.4),
            'description'=> 'good',
           
        ],
        [
            'product_name'=>'lemon',
            'image'=>'products/lemon.png',
            'price'=> random_float(1.0,10.4),
            'description'=> 'very good',
           
        ],
        [
            'product_name'=>'strawberry',
            'image'=>'products/strawberry.png',
            'price'=> random_float(1.0,10.4),
            'description'=> 'good',
           
        ],

    ];


    return $products[$i];
}, $for = 2);

