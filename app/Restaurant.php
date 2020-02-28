<?php

//Restaurant Model

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
}
public function reservation(){
  return $this->hasMany('App\Reservation');
}
  public function reviews(){
    return $this->hasMany('App\Review');
  }
}
