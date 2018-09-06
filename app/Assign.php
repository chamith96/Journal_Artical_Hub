<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Journal;
use App\Assign;

class Assign extends Model
{
  //make relationship with Journal model
  public function journals(){
    return $this->hasMany('App\Journal');
  }
}
