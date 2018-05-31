<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Artist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AppDBModel extends Model
{


    /**
     * get first given number of fetch rows 
     * 
     * @return object
     */
    public function fetch($colName, $num){
        if($colName == null || $num < 0){
            return null;
        }
        $res = DB::table($this->table)->select($colName)->take($num)->get();
        return $res;
    }

    /**
     * get Primary Col values of the given table
     * 
     * @return a single value
     */
    public function getCol($targetCol,  $hasColName, $hasColVal){
        $res = DB::table($this->table)->select($targetCol)->where($hasColName, $hasColVal)->get();
        Log::debug("result ="); Log::debug($res);
        //return $this->get_obj_vars_array($res, $targetCol);
        return $res;
    }

    /**
     * get the values stored in the give object
     * 
     * @return an array of values
     */
    private function get_obj_vars_array($objs, $targetCol){
        $res = [];
        if($objs == null || $targetCol == null){
            return $res;
        }
        for($i = 0 ; $i < sizeof($objs); $i++){
            $arr = get_object_vars($objs[$i]);
            array_push($res, $arr[$targetCol]);
            //array_push($res, [$arr[$targetCol]);
        }
        return $res;
    }



}
