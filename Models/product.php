<?php
class Product extends Base_model
{
    protected $table_name = "products";
    protected $columns = [
        "id INT(11) AUTO_INCREMENT PRIMARY KEY",
        "product_name VARCHAR(255) NOT NULL",
        "price DECIMAL(10,2) NOT NULL",
        "description TEXT",
        "image VARCHAR(255)"
    ];
}
