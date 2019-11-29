<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class list_user_animes extends Model
{
    protected $fillable = [
        'id_animes', 'id_user',
    ];
}
