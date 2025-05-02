<?php


function register_controller()
{
    if (checkAuth()) {
        go('products', null, false);
    }
    $data = validations([
        "username" => "required",
        'email' => "required|isEmail|where:User,email",
        'password' => "required|password:4"
    ]);
    if ($data) {
        $data['role'] = 'user';
        if (User::insert_data($data)) {
            go("login", null, false);
        } else {
            echo "<script>alert('errorrr');</scrript>";
        }
    }
}
