<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assign;
use DB;

class AssignController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
    return view('admin/assign');
  }

  public function show()
  {
    $assign = DB::table('reviewers')
                  ->join('assigns','reviewers.id','=','assigns.reviewer_id')
                  ->join('journals','journals.id','=','assigns.journal_id')
                  ->join('users','journals.user_id','=','users.id')
                  ->select('reviewers.name as rname','journals.title as jtitle','users.name as uname', 'assigns.created_at  as createdAt', 'assigns.status  as status', 'assigns.id  as assignid')
                  ->orderBy('assigns.created_at', 'desc')->get();
    //$assign = DB::select('SELECT * from reviewers,journals,assigns,users where reviewers.id=assigns.reviewer_id and journals.id=assigns.journal_id and journals.user_id=users.id');

    return view('admin/assign')->with('assign', $assign);
  }

  public function updateStatus(Request $request, $id)
  {
    $assign = Assign::find($id);
    $assign->status = $request->input('status');
    $assign->save();
    return redirect('/admin/assigns');
  }
}
