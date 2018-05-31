<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistTrack extends AppDBModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'PlaylistTrack';
    public $primaryKey = ['pid', 'tid'];
    public $timestamps = false;
    public $incrementing = false;
}
