<?php


function seeder($model, $callback, $for = 1)
{
    if(count($model::get_all_data()) <= 1){

        for ($i = 0; $i <= $for; $i++) {
            $model::insert_data($callback($i));
        }
    }
}
