<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairRequest extends Model
{
    use HasFactory;

    protected $table = 'repair_requests'; // Table name

    protected $primaryKey = 'request_id'; // Specify the primary key

    protected $fillable = [
        'user_id',
        'address_id',
        'service_type',
        'description',
        'status',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
