<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceModel extends Model
{
    use HasFactory;

    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class);
    }

    public function repairRequests()
    {
        return $this->hasMany(RepairRequest::class);
    }
}
