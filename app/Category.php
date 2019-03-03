<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =
        [
            'name'
        ];

    //Todo Check if will have conflicts
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
