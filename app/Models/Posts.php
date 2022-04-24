<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Posts extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'posts';

    // post has only one user
    public function PostPerUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}