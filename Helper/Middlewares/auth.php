<?php 

include_once '../methods/requset.php';

function authMiddleware($requireAdmin = false){
    
    if(isset($_SESSION['user'])){
        $user = User::get_data_by_id($_SESSION['user']['id']);
        if(!$user){
            go('login');
        }
        if($requireAdmin && $user['role'] != 'admin'){
            go('404');
        }
    }else{
        go('login');
    }
}
