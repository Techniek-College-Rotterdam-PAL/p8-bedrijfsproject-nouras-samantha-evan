<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses'; // Table name

    protected $primaryKey = 'address_id'; // Specify the primary key

    protected $fillable = [
        'street',
        'house_number',
        'city',
        'postal_code',
        'country',
    ];

    // Relationships
    public function repairRequests()
    {
        return $this->hasMany(RepairRequest::class, 'address_id');
    }
}
