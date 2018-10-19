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
    $assign1 = DB::table('reviewers')
              ->join('assigns','reviewers.id','=','assigns.reviewer_id')
              ->join('journals','journals.id','=','assigns.journal_id')
              ->join('users','journals.user_id','=','users.id')
              ->select('reviewers.name as rname','journals.title as jtitle','users.name as uname', 'assigns.created_at  as createdAt', 'assigns.status  as status', 'assigns.id  as assignid')
              ->orderBy('assigns.created_at', 'desc')
              ->paginate(5);
    return view('admin/assign')->with('assign1', $assign1);
  }

  public function search(Request $request)
  {
      $search = $request->get('search');
      if ($search !="") {
        $assign = DB::table('reviewers')
                  ->join('assigns','reviewers.id','=','assigns.reviewer_id')
                  ->join('journals','journals.id','=','assigns.journal_id')
                  ->join('users','journals.user_id','=','users.id')
                  ->where('users.name', 'LIKE', '%' . $search . '%')
                  ->orWhere('reviewers.name', 'LIKE', '%' . $search . '%')
                  ->orWhere('journals.title', 'LIKE', '%' . $search . '%')
                  ->select('reviewers.name as rname','journals.title as jtitle','users.name as uname', 'assigns.created_at  as createdAt', 'assigns.status  as status', 'assigns.id  as assignid')
                  ->orderBy('assigns.created_at', 'desc')
                  ->get();

        return view('admin/assign')->with('assign', $assign);

    } else {
      return redirect('admin/assigns');
    }
  }

  public function updateStatus(Request $request, $id)
  {
    $assign = Assign::find($id);
    $assign->status = $request->input('status');
    $assign->save();
    return redirect('/admin/assigns');
  }

}
