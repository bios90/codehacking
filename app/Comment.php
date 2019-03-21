<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable =
        [
            'post_id',
            'author',
            'email',
            'body',
            'is_active',
            'photo',
        ];

    public function replies()
    {
        return $this->hasMany('App\CommentReply','comment_id','id');
    }

    public function post()
    {
        return $this->belongsTo('App\Post','post_id','id');
    }
}
