<?php

namespace App\Models;

use App\Models\Post;
use App\Models\LikeDislike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeDislike extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
