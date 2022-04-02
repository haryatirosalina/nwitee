<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\LikeDislike;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{

    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'post';

    protected $fillable = [
        'description',
        'topics',
        'file',

    ];

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\LikeDislike', 'post_id')->sum('like');
    }
    public function dislikes()
    {
        return $this->hasMany('App\Models\LikeDislike', 'post_id')->sum('dislike');
    }
    use HasFactory;
}
