<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{

  //make relationship with User model
  public function user(){
    return $this->belongTo('App\User');
  }

  //make relationship with Reviewer model
  public function reviewer()
  {
    return $this->hasMany('App\Reviewer');
  }

  //make relationship with JournalsImage model
  public function journalsImage(){
    return $this->belongTo('App\JournalsImage');
  }
}
