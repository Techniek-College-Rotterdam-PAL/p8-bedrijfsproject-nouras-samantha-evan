<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'date',
        'time',
        'status',
    ];

    /**
     * Een afspraak behoort tot een gebruiker.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Een afspraak behoort tot een service.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
