<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Review extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = "reviews";

    public $fillable = ['user', 'rating', 'comment', 'game', 'user_id'];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
