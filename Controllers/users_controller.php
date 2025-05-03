<?php


function users_controller()
{
    authMiddleware(true);
    $request = validations([
        "method" => "required"
    ]);
    if ($request) {
        if ($request['method'] == "delete") {
            $requestData = validations([
                "id" => "required"
            ]);
            User::delete_data($requestData['id']);
        }else if($request['method'] == "edit"){
            $requestData = validations([
                "id" => "required",
                "email"=> "required",
                "username"=>"",
                "role"=>"",

            ]);
            User::update_data($requestData['id'],$requestData);
        }else if ($request['method'] == "add"){
            $requestData = validations([
                "email"=> "required|where:User,email",
                "username"=>"required",
                "password"=>"required|password:6",
                
            ]);
            
            User::insert_data($requestData);
        }
    }
    
    
    
    return User::get_all_data();
}
