<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    protected $fillable = [
        'name', 'surname', '', '',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        '', '',
    ];
}
