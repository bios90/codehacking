<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =
        [
            'title',
            'body',
            'user_id',
            'category_id',
            'photo_id'
        ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function photo()
    {
        //Todo Check if Error to change it to BELONGS To lection 28Application - 4
        return $this->hasOne('App\Photo','id','photo_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
}
