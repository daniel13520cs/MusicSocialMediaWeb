<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AppDBModel;

class Artist extends AppDBModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Artist';
    public $primaryKey = 'aid';
    public $timestamps = false;
    public $incrementing = false;




}
