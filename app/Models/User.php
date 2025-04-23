<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'nip',
        'plant_id',
        'role_id',
        'id_cards',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // otomatis hashing password
    ];

    protected $table = 'users';

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}

