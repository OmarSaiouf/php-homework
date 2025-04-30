<?php

// Database conn
const DB_HOST = 'localhost';
const DB_DATABASE = "omar_store";
const DB_USERNAME = "root";
const DB_PASSWORD = '';


//Base paths
define('DOMIN', isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');
const BASE_STORAGE = 'assets/storage';
const PRODUCT_PATH = BASE_STORAGE . '/products';
