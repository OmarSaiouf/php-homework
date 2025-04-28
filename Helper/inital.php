<?php
include_once 'database_tools/database.php';


// -----------------------------------------------------------
// -------------------الاتصال بقاعدة الباينات----------------
// -----------------------------------------------------------
$db = mysqli_connect("localhost", "root", "", "omar_store");

$conn = new Mysql_api_code($db);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} else {
    try {
        if (!$conn->sql_check_table("users")) {
            $conn->sql_create_table("users", [
                "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY",
                "username VARCHAR(30) NOT NULL",
                "email VARCHAR(50) NOT NULL",
                "password VARCHAR(50) NOT NULL",
                "role ENUM('admin', 'user') NOT NULL DEFAULT 'user'",
                "reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
            ]);
        }
        if (!$conn->sql_check_table("product")) {
            $conn->sql_create_table("product", [
                "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY",
                "name VARCHAR(30) NOT NULL",
                "price DECIMAL(10, 2) NOT NULL",
                "description TEXT NOT NULL",
                "image VARCHAR(255) DEFAULT NULL",
                "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP"
            ]);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
