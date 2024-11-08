<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',        // Add 'name' here
        'type_id',     // Add other relevant fields you want to allow for mass assignment
    ];

    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class, 'type_id');
    }

    public function repairRequests()
    {
        return $this->hasMany(RepairRequest::class);
    }
}
