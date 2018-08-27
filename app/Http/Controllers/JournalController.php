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
    return view('admin.journal.journal')->with('journal',$journal);
  }

  public function show($id)
{
    $journal = Journal::find($id);
    return view('admin.journal.Journalshow')->with('journal', $journal);
}

//download journal details pdf file
public function downloadPDF($id)
{
  $journal = Journal::find($id);
  $pdf = PDF::loadView('journal.journalPDF', compact('journal')); //path to user view pdf
  $journalName = $journal->title;
  return $pdf->download("$journalName.pdf");
}

//pdf download
public function PdfDownload($id)
{
  $journal = Journal::find($id);
  return response()->download(public_path("storage/journals/".$journal->id."/pdf/"."$newsletter->id".".pdf"));
}

//zip download
public function DocDownload($id)
{
  $journal = Journal::find($id);
  $file4 = file('doc');
  $takeFile = $file4->getClientOriginalName();
  return response()->download(public_path("storage/journals/".$journal->id."/doc/"."$newsletter->id".".docx"));
}

}
