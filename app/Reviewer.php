<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
  //make relationship with Journal model
  public function journals()
  {
    return $this->hasMany('App\Journal');
  }
}
