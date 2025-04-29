<?php
class Product extends Base_model
{
    protected $table_name = "Products";
    protected $columns = [
        "id INT(11) AUTO_INCREMENT PRIMARY KEY",
        "name VARCHAR(255) NOT NULL",
        "email VARCHAR(255) NOT NULL",
        "password VARCHAR(255) NOT NULL",
        "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP",
    ];
}
