<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairType extends Model
{
    use HasFactory;
    public function repairRequests()
    {
        return $this->belongsToMany(RepairRequest::class, 'repair_request_repair_type');
    }
}
