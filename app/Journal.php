<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
  //make relationship with User model
  public function user()
  {
    return $this->belongTo('App\User');
  }
}
