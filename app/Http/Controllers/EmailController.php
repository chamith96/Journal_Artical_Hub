<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailReviewer;
use App\EmailUser;

class EmailController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

//show email index
  function index()
  {
    return view('admin.email.email');
  }

//show email user page
  function indexUser()
  {
    return view('admin.email.emailUser');
  }

//show email reviewer page
  function indexReviewer()
  {
    return view('admin.email.emailReviewer');
  }

// show user Emails
function showUser()
{
  $emailUser = EmailUser::orderBy('created_at', 'desc')->paginate(10);
  return view('admin.email.emailUser')->with('emailUser',$emailUser);
}

// show reviewer Emails
function showReviewer()
{
  $emailReviewer= EmailReviewer::orderBy('created_at', 'desc')->paginate(10);
  return view('admin.email.emailReviewer')->with('emailReviewer',$emailReviewer);
}

//show user content
function userContent($id)
{
  $user = EmailUser::find($id);
  return view('admin.email.userContent')->with('user', $user);
}

//show reviewer content
function reviewerContent($id)
{
  $reviewer = EmailReviewer::find($id);
  return view('admin.email.reviewerContent')->with('reviewer', $reviewer);
}

}
