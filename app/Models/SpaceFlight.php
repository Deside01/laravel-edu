<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $flight_number
 * @property string $destination
 * @property string $launch_date
 * @property int $seats_available
 */
class SpaceFlight extends Model
{
    protected $fillable = [
        'flight_number',
        'destination',
        'launch_date',
        'seats_available'
    ];

    public function books(): HasMany
    {
        return $this->hasMany(UserFlight::class, 'flight_id', 'id');
    }
}
