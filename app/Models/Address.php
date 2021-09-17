<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'city',
        'zip_code',
        'country_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo('App\Models\Country');
    }
}
