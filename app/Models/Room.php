<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Room extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $fillable = ['name', 'organization', 'image', 'game'];

    public $timestamps = false;

}
