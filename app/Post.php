<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return
            [
            'slug' =>
                [
                'source' => 'title',
                ]
            ];
    }


    protected $fillable =
        [
            'title',
            'body',
            'user_id',
            'category_id',
            'photo_id',
            'slug'
        ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function photo()
    {
        //Todo Check if Error to change it to BELONGS To lection 28Application - 4
        return $this->hasOne('App\Photo', 'id', 'photo_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function photoPlaceholder()
    {
        return "https://place-hold.it/700x200.jpg/666/fff/000";
    }
}
