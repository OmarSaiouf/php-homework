<?php 
function logout_controller(): void{
    if(isset(get_session('user')['id'])){
        delete_session('user');
    }
    go('login', null, false);
}