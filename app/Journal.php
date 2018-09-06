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

  //make relationship with Reviewer model
  public function reviewers(){
    return $this->hasMany('App\Reviewer');
  }

  //make relationship with Assign model
  public function assigns(){
    return $this->hasMany('App\Assign');
  }
}
