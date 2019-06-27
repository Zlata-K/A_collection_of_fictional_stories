<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    // Table name
    protected $table = 'stories';
    // Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestapms = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        //return $this->hasMany('App\Comment');
        return $this->morphMany(Comment::class, 'commentable'); //Polymorphic relationship between the models
    }
}
