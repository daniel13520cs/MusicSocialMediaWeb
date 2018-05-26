<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;

class PeopleController extends Controller
{
    public static function fetch() {
        $people = People::select('name')->take(30)->get();
        return $people;
        
    }

}
