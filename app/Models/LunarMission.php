<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $user_id
 * @property array $name
 * @property array $launch_details
 * @property array $landing_details
 * @property array $spacecraft
 *
 * @property-read User $author
 */
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

    /**
     * @return HasOne
     */
    public function author(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
