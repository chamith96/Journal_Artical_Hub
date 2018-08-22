<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Journal;

class JournalController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  //show all journals to admin
    public function index()
  {
    $journal = Journal::orderBy('created_at', 'desc')->paginate(5);
    return view('admin.journal')->with('journal',$journal);
  }

  public function show($id)
{
    $journal = Journal::find($id);
    return view('admin.Journalshow')->with('journal', $journal);
}
}
