<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Journal;
use App\Reviewer;
use App\EmailReviewer;
use PDF;
use Zipper;

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

//zip download
public function downloadZip($id)
{
  $journal = Journal::find($id);
  $files = glob(public_path("storage/journals/"."$journal->id"."/*"));
  Zipper::make(public_path("storage/journals/"."$journal->id"."/Journal "."$journal->id".".zip"))->add($files)->close();

  return response()->download(public_path("storage/journals/"."$journal->id"."/Journal "."$journal->id".".zip"))->deleteFileAfterSend(true);
}

//journal send to reviewer email
  public function emailPage()
{
  return view('admin.journal.journalEmail');
}

//show all reviewers
public function showReviewers()
{
  $reviewer = Reviewer::all();
  return view('admin.journal.journalEmail')->with('reviewer',$reviewer);
}

public function sendEmail(Request $request)
{
  $request->validate([
    'reviewer' => 'required|email',
    'subject' => 'required|string',
    'body' => 'required|string',
    'file' => 'mimes:pdf,zip,doc,docx'
  ]);

  //save data to database
  $emailReviewer = new EmailReviewer;
  $emailReviewer->reviewer_email  = $request->input('reviewer');
  $emailReviewer->subject = $request->input('subject');
  $emailReviewer->body = $request->input('body');
  $emailReviewer->save();

  //email to Sumbission
  $data = array('reviewer_email' => $emailReviewer->reviewer_email,
                'subject' => $emailReviewer->subject,
                'body' => $emailReviewer->body,
                'file' => $request->file,
                'title' => 'New Journal to Review'
                );
  Mail::send('emails.Reviewer_Response', $data, function($message) use($data) {
  $message->to($data['reviewer_email']);
  $message->subject($data['title']);
  $message->from('admin@abc.com');
  $message->attach($data['file']->getRealPath(), array(
                  'as' => 'file'.$data['file']->getClientOriginalExtension(),
                  'mime' => $data['file']->getMimeType())
                  );
  });

  return redirect('/admin/journals')->with('success', 'Email sent.');
  }

}
