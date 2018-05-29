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
    public function getPCol($targetCol,  $hasColName, $hasColVal){
        $res = DB::table($this->table)->select($targetCol)->where($hasColName, $hasColVal)->get();
        return get_object_vars($res[0])[$targetCol];
    }

    /**
     * get Primary Col values of the given table
     * 
     * @return an array of values
     */
    public function getNonPCol($targetCol,  $hasColName, $hasColVal){
        $res = DB::table($this->table)->select($targetCol)->where($hasColName, $hasColVal)->get(); 
        return get_obj_vars_array($res, $targetCol);
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
        foreach($objs as $key=>$obj){
            $arr = get_object_vars($obj);
            array_push(res, $arr[$targetCol]);
        }
        return $res;
    }




}
