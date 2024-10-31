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
        'user_id',
        'model_id',
        'name',
        'email',
        'phone',
        'description',
        'created_at',
        'updated_at',
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
