<?php
const STORE_NAME = "OMAR";


// Database conn
const DB_HOST = 'localhost';
const DB_DATABASE = "omar_store";
const DB_USERNAME = "root";
const DB_PASSWORD = '';

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
//Base paths
define('DOMIN', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']  : '');
const BASE_STORAGE = 'assets/storage';
const PRODUCT_PATH = BASE_STORAGE . '/products';
