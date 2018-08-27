<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  //show all user to admin
    public function index()
  {
    $user = User::orderBy('created_at', 'desc')->paginate(5);
    return view('admin.user.userShow')->with('user',$user);
  }

    public function showEmail($id)
  {
    $user = User::find($id);
    return view('admin.user.userEmail')->with('user', $user);
  }
}
