<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends AppDBModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Likes';
    public $primaryKey = ['id', 'aid'];
    public $timestamps = false;
    public $incrementing = false;


}
