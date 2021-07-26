<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class ForumPost extends Model
{
    use HasFactory, Commentable;

    protected $fillable = [
        'body'
    ];

    protected $table = 'forum_post';

    public function user() {
        return $this->belongsTo(User::class);
    }
}
