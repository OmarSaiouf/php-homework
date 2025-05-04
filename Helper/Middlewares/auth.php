<?php

function checkAuth()
{
    return isset(get_session('user')['id']);
}

function authMiddleware($requireAdmin = false)
{

    if (checkAuth()) {
        $user = User::get_data_by_id(get_session('user')['id']);

        if (isset($user[0])) {
            add_session('user', $user[0]);
        } else {
            go('login', null, false);
        }
        if ($requireAdmin && $user['role'] != 'admin') {
            go('404', null, false);
        }
    } else {
        go('login', null, false);
    }
}
