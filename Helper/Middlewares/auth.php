<?php

function checkAuth()
{
    return isset(get_session('user')['id']); 
}

function authMiddleware($requireAdmin = false)
{

    if (checkAuth()) {
        $user = User::get_data_by_id(get_session('user')['id']);
        if (!$user) {
            go('login',null,false);
        }
        if ($requireAdmin && $user['role'] != 'admin') {
            go('404',null,false);
        }
    } 
}
