<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class detailForum extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'forums';

    protected $fillable = [
        'deskripsi',
        'file'

    ];
    
    use HasFactory;
}
