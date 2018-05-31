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


    /**
     * get the values stored in the give object
     * 
     * @return an array of values
     */
    public static function get_obj_vars_array($objs, $targetCol){
        $res = [];
        if($objs == null || $targetCol == null){
            return $res;
        }
        for($i = 0 ; $i < sizeof($objs); $i++){
            $arr = get_object_vars($objs[$i]);
            array_push($res, $arr[$targetCol]);
        }
        Log::debug($res);
        return $res;
    }






















}

