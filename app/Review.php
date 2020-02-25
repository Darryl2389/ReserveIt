<?php

namespace App;
use App\User;
use App\Restaurant;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
}
//
public function restaurant(){
  return $this->belongsTo('App\Restaurant');
}
}
