<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financa extends Model
{
    protected $fillable=[
        'description' ,
        'valor' ,
        'tipo',
    ];
}
