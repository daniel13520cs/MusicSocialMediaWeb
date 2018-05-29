<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Artist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AppDBModel extends Model
{


    public function fetch($colName, $num){
        if($colName == null || $num < 0){
            return null;
        }
        $res = DB::table($this->table)->select($colName)->take($num)->get();
        return $res;
    }

    /**
     * get Col values of the given table
     * 
     * return an array in format of $hasColName=>$hasCol
     */
    public function getCol($targetCol,  $hasColName, $hasColVal){
        $resObj = DB::table($this->table)->select($targetCol)->where($hasColName, $hasColVal)->get();
        Log::debug($resObj);
        return $this->get_object_vars_array($resObj);
    }


    private function get_object_vars_array($resObj){
        //Log::debug(get_object_vars($resObj));
        //return get_object_vars($resObj);
        return null;
    }



}
