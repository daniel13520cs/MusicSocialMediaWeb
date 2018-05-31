<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayList extends AppDBModel
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Playlist';
    public $primaryKey = 'pid';
    public $timestamps = false;

}
