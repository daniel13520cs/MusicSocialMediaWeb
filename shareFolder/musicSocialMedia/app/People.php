<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;

    protected $guarded = [];

}
