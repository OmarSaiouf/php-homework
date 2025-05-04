<?php


function login_controller()
{
    if (checkAuth()) {
        go('products', null, false);
    }
    $data = validations([
        'email' => "required|isEmail",
        'password' => "required|password:4"
    ]);
    if ($data != false) {
        $email = User::where("email", $data['email'])[0];
        if ($email) {
            // print_r($data);
            // echo $email['password'];
            $pass = $email['password'] === $data['password'];
            if ($pass) {
                add_session("user", $email);
                go("products", null, false);
            } else {
                echo "vaild password";
            }
        } else {
            echo "the email is not found";
        }
    }
}
