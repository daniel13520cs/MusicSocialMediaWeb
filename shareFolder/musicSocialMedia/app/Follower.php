<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Follow';
    public $primaryKey = ['follower', 'followee'];
    public $timestamps = false;
    public $incrementing = false;
}
