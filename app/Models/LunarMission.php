<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LunarMission extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'launch_details',
        'landing_details',
        'spacecraft',
    ];

    protected $casts = [
        'launch_details' => 'json',
        'landing_details' => 'json',
        'spacecraft' => 'json',
    ];
}
