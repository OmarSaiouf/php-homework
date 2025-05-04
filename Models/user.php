<?php
class User extends Base_model
{
    protected $table_name = "users";
    protected $columns = [
        "id INT(11) AUTO_INCREMENT PRIMARY KEY",
        "username VARCHAR(255) NOT NULL",
        "role ENUM('admin', 'user') NOT NULL DEFAULT 'user'",
        "email VARCHAR(255) NOT NULL",
        "password VARCHAR(255) NOT NULL",
        "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP",
    ];
}
