<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

    public function photo()
    {
        return $this->hasOne('App\Photo', 'id', 'photo_id');
    }

    public function isAdmin()
    {
        //Todo check this self maded check
        if ($this->role == null)
        {
            return false;
        }
        if ($this->role->id == 1 && $this->is_active == 1)
        {
            return true;
        }
        return false;
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id', 'id');
    }

    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email']))) . "?d=mm";

        return "http://www.gravatar.com/avatar/$hash";
    }

    public function myCustom()
    {
        $hash = md5(strtolower(trim($this->attributes['email']))) ;

        return "http://www.gravatar.com/avatar/$hash";
    }
}
