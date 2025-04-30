<?php
session_start();
include_once 'config.php';
include_once 'database_tools/base_model.php';
include_once 'Models/user.php';
include_once 'methods/requset.php';


// -----------------------------------------------------------
// -------------------الاتصال بقاعدة الباينات----------------
// -----------------------------------------------------------
$dd = request();

print_r($dd);
print(go('products', ['type'=>'asdf']));