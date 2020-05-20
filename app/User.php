<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     

    
    public function topics()
    {
        return $this->hasMany('App\Topic');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // Relation helokent de role 
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
//autoriser les action get 
    public function isAdmin()
    {
        return $this->roles()->where('name','admin')->first();
    }

    public function hasAnyRole(array $roles)
    {
        return $this->roles()->whereIn('name', $roles)->first();
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
