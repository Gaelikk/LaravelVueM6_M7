<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Book extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = "books";

    public $fillable = ['user', 'phone', 'country', 'date', 'room', 'game', 'user_id'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
