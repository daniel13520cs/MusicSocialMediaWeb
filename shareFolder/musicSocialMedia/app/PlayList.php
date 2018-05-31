<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends AppDBModel
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Playlist';
    public $primaryKey = 'pid';
    public $timestamps = false;

    protected $guarded = [];

    //public $fillable = ['pid', 'ptitle', 'pdate', 'id', 'status'];

}
