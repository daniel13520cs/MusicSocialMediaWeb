<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;



class DBController extends Controller
{
    
    public $model;

    public function __construct()
    {
        
    }

    public function setModel(Model $model){
        $this->model = $model;
    }

    public function getCol($targetCol,  $hasColName, $hasColVal){
        if(!Utility::isInputValid($targetCol, $hasColName, $hasColVal)){
            return;
        }
        $primaryKey = $this->model->getKeyName();
        // if($this->isPrimaryKey($targetCol)){
        //     Log::debug("isPrimaryKey!");
        //     return $this->model->getPCol($targetCol,  $hasColName, $hasColVal);
        // }
        // return $this->model->getNonPCol($targetCol,  $hasColName, $hasColVal);
        return $this->model->getCol($targetCol,  $hasColName, $hasColVal);
    }

    private function isPrimaryKey($targetCol){
        $primaryKey = $this->model->getKeyName();
        if(!is_array($primaryKey)){
            return (!strcmp($targetCol, $primaryKey));
        }

        for( $i = 0 ; $i < sizeof($primaryKey); $i++){
            if(!strcmp($targetCol, $primaryKey[$i])){
                return true;
            }
        }
        return false;
    }
}
