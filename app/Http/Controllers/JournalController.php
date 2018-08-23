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

//download journal pdf file
public function downloadPDF($id)
{
  $journal = Journal::find($id);
  $pdf = PDF::loadView('journal.journalPDF', compact('journal')); //path to user view pdf
  $journalName = $journal->title;
  return $pdf->download("$journalName.pdf");
}
}
