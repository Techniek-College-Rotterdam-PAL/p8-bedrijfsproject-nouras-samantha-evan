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
        'device_model_id',
        'device_type_id',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deviceModel()
    {
        return $this->belongsTo(DeviceModel::class);
    }

    public function repairTypes()
    {
        return $this->belongsToMany(RepairType::class, 'repair_request_repair_type');
    }
}
