<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairRequest extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'repair_requests';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'name',
        'phone',
        'email',
        'user_id',
        'address_id',
        'service_type',
        'description',
        'status',
    ];

    /**
     * Get the user that submitted the repair request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the address associated with the repair request.
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
