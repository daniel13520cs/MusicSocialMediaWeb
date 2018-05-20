<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{

    /**
     * show eacho
     */

    public function page($pageName='home'){
        return view($pageName);
    }

}