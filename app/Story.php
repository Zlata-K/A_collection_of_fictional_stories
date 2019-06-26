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
}
