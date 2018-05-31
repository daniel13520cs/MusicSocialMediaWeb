<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPlaylist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'UserPlaylist';
    public $primaryKey = ['id', 'pid'];
    public $timestamps = false;
    public $incrementing = false;

    public $fillable = ['pid', 'id'];
}
