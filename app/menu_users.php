<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu_users extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu',
    ];
}
