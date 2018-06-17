<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends AppDBModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public $primaryKey = ['id'];
    public $timestamps = false;
    public $incrementing = false;

    protected $guarded = [];



}
