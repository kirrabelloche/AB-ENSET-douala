<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id','category_id','tag_id','title','slug','body','file'];
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->belongsTo('App\Like');
    }


}
