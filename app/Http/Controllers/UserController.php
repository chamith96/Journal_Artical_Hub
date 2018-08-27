<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\EmailUser;

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

    public function sendEmail(Request $request)
  {
    $request->validate([
      'author' => 'required|email',
      'subject' => 'required|string',
      'body' => 'required|string',
    ]);

    //save data to database
    $emailUser = new EmailUser;
    $emailUser->user_email  = $request->input('author');
    $emailUser->subject = $request->input('subject');
    $emailUser->body = $request->input('body');
    $emailUser->save();

    //email to Sumbission
    $data = array('user_email' => $emailUser->user_email,
                  'subject' => $emailUser->subject,
                  'body' => $emailUser->body
                  );
    Mail::send('emails.User_email', $data, function($message) use($data) {
    $message->to($data['user_email']);
    $message->subject($data['subject'],
                      $data['body']
                      );
    $message->from('admin@abc.com');
  });

    return redirect('/admin/users')->with('success', 'Email sent.');
    }

}
