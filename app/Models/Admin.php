<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'name',
        'email',
        'phonenumber',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function register($data)
    {
        // Hash the password before saving the admin
        $data['password'] = Hash::make($data['password']);
        
        return self::create($data);
    }

    public function login($credentials)
    {
        if (auth()->attempt($credentials)) {
            return auth()->user(); // Return the authenticated admin
        }

        return false; // Invalid credentials
    }

    public function updateProfile($data)
    {
        $admin = auth()->user();

        // Check if password is being updated and hash it
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $admin->update($data);

        return $admin;
    }
}
