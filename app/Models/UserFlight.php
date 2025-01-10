<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserFlight extends Model
{
    protected $fillable = [
        'user_id',
        'flight_id',
    ];


}
