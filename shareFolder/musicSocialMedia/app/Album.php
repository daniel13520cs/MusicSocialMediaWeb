<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Album';
    public $primaryKey = 'alid';
    public $timestamps = false;
    public $incrementing = false;
}
