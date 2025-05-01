<?php


function random_float($min, $max, $decimals = 2) {
    $scale = pow(10, $decimals);
    return mt_rand($min * $scale, $max * $scale) / $scale;
}

function storage($path){
    return DOMIN.'/assets/storage/'.$path;
}