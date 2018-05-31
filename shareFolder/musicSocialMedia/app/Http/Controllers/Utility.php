<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;


class Utility 
{


/**
 * check if the input varibales are null
 * 
 * @return true if one of them is null
 */
public static function isInputValid(){
    $numargs = func_num_args();
    Log::debug("somethign");
    Log::debug($numargs);
    for($i = 0; $i < $numargs; $i++){
        if(func_get_arg($i) == null){
            return false;
        }
    }
    return true;
}






















}

