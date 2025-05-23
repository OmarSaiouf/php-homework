<?php

function required($data)
{
    if (!isset($data) || trim($data) === '') {
        return [true, 'This feild is required'];
    }
    return [false];
}

function isEmail($data)
{
    if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
        return [false];
    }
    return [true, 'Invalid email address'];
}

function password($data, $count)
{
    if (!preg_match('/^[a-zA-Z0-9]+$/', $data)) {
        return [true, "Password must contain only English letters"];
    }
    if (strlen($data) < $count) {
        return [true, "Password must be at least $count characters long"];
    }
    return [false];
}

function where($data, $input)
{
    $input = explode(",", $input);

    $value = !isset($input[0]::where($input[1], $data)[0]);
    return $value ? [false] : [true, "the value is fount in '$input[1]'"];
}
