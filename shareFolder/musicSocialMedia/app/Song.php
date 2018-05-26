<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Track';
    public $primaryKey = 'tid';
    public $timestamps = false;
    public $incrementing = false;
}
