<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    //
    protected $fillable=[
        'user_id',
        'goal_name',
        'goal_amount',
        'goal_deadline',
        'goal_description',
        'amount_saved',
        'status',
    ];
}
