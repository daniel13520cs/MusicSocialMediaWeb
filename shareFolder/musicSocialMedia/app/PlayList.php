<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'UserPlaylist';
    public $primaryKey = ['pid', 'uid'];
    public $timestamps = false;
    public $incrementing = false;

}
