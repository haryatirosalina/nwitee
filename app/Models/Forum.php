<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Forum extends Model
{

    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'forum';

    protected $fillable = [
        'forum',
        'topics',
        'post',

    ];
    
    use HasFactory;
}
