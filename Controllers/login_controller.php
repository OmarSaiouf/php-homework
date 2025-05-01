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
        $email = User::where("email", $data['email']);
        print_r($email);
        if ($email) {
            $pass = $email['password'] == $data['password'];
            if ($pass) {
                print_r($email);
                // add_session("user",["name"=>$email['username']]);
            }
        }
    }
}
