<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = "users";

    public $fillable = ['name','surname', 'email', 'username', 'password', 'type'];

    public $hidden = ['password', 'remember_token',];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    const ADMIN_TYPE = 'admin';
    const WORKER_TYPE = 'worker';
    const DEFAULT_TYPE = 'default';

    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }

    public function isWorker()
    {
        return $this->type === self::WORKER_TYPE;
    }

    public function isDefault()
    {
        return $this->type === self::DEFAULT_TYPE;
    }

    public $timestamps = false;

}
