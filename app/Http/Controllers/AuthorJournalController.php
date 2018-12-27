<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Journal;
use App\Assign;
use App\User;
use App\JournalsImage;
use DB;
use Illuminate\Support\Facades\Mail;
//use App\Notifications\assignNotification;

class AuthorJournalController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

//show all journals to user
  public function index()
{
  $user_id = auth()->user()->id;
  $user = User::find($user_id);
  return view('journal.journal')->with('journal', $user->journals); //$user->journals ;journals is User model function, not database field
}

//assigns reviewers
  public function assign($id)
{
  $journal = Journal::find($id);
  $user_id = auth()->user()->id;

if(auth()->user()->id == $journal->user_id){
  $status = DB::table('assigns')
                ->join('reviewers','reviewers.id','=','assigns.reviewer_id')
                ->join('journals','journals.id','=','assigns.journal_id')
                ->join('users','journals.user_id','=','users.id')
                ->where('users.id', '=',$user_id)
                ->where('journals.id','=',$journal->id)
                ->select('assigns.status as action', 'reviewers.name as reviewer')
                ->get();
  //$status = DB::select("SELECT `assigns.status FROM assigns,journals,users WHERE assigns.journal_id=journals.id AND users.id=journals.user_id AND users.id=$user_id AND journals.id=$journal->id");

    return view('journal.JournalAssign', compact('status'));
  } else {
    return redirect('dashboard')->with('$error', 'Unauthorized access');
  }
}

//show journal details to user
  public function show($id)
{
    $journal = Journal::find($id);
    $user_id = auth()->user()->id;

  if(auth()->user()->id == $journal->user_id){
    $status = DB::table('assigns')
                  ->join('reviewers','reviewers.id','=','assigns.reviewer_id')
                  ->join('journals','journals.id','=','assigns.journal_id')
                  ->join('users','journals.user_id','=','users.id')
                  ->where('users.id', '=',$user_id)
                  ->where('journals.id','=',$journal->id)
                  ->select('assigns.status as action', 'reviewers.name as reviewer')
                  ->get();
    //$status = DB::select("SELECT `assigns.status FROM assigns,journals,users WHERE assigns.journal_id=journals.id AND users.id=journals.user_id AND users.id=$user_id AND journals.id=$journal->id");

      return view('journal.Journalshow', compact('journal'));
    } else {
      return redirect('dashboard')->with('$error', 'Unauthorized access');
    }
}

//create journal
  public function create()
  {
  return view('journal.journalCreate');
  }

//store journal
  public function store(Request $request)
  {

    //save data to database
    $journal = new Journal;
    $journal->title = $request->input('title');
    $journal->abstract = $request->input('abstract');
    $journal->keywords = $request->input('keywords');
    $journal->a1fname = $request->input('a1fname');
    $journal->a1lname = $request->input('a1lname');
    $journal->a1affiliation = $request->input('a1affiliation');
    $journal->a1email = $request->input('a1email');
    $journal->a2fname = $request->input('a2fname');
    $journal->a2lname = $request->input('a2lname');
    $journal->a2affiliation = $request->input('a2affiliation');
    $journal->a2email = $request->input('a2email');
    $journal->a3fname = $request->input('a3fname');
    $journal->a3lname = $request->input('a3lname');
    $journal->a3affiliation = $request->input('a3affiliation');
    $journal->a3email = $request->input('a3email');
    $journal->a4fname = $request->input('a4fname');
    $journal->a4lname = $request->input('a4lname');
    $journal->a4affiliation = $request->input('a4affiliation');
    $journal->a4email = $request->input('a4email');
    $journal->user_id = auth()->user()->id;
    $journal->save();

    //get journalId
    $journalId = $journal->id;

    //handle image upload
    if ($request->hasFile('image1')) {
      $file1 = $request->file('image1');
          //get file name with extension
          $takeFile = $file1->getClientOriginalName();
          //get just file name
          $filename = pathinfo($takeFile, PATHINFO_FILENAME);
          //get just extension
          $extension = $file1->getClientOriginalExtension();
          //file name to store
          $fileNameToStore1 = $filename.'.'.$extension;
          //upload images
          $path = $file1->storeAs("public/journals/".$journalId, $fileNameToStore1);

          //save data to database 2
          $journals = new JournalsImage;
          $journals->journal_id = $journalId;
          $journals->image = $fileNameToStore1;
          $journals->save();
    }

    //handle pdf upload
    if ($request->hasFile('pdf')) {
      $pdf = $request->file('pdf');
          //get file name with extension
          $takeFile = $pdf->getClientOriginalName();
          //get just file name
          $filename = pathinfo($takeFile, PATHINFO_FILENAME);
          //get just extension
          $extension = $pdf->getClientOriginalExtension();
          //file name to store
          $fileNameToStore = $filename.'.'.$extension;
          //upload images
          $path = $pdf->storeAs("public/journals/".$journalId, $fileNameToStore);
    }
    //handle doc upload
    if ($request->hasFile('doc')) {
      $doc = $request->file('doc');
          //get file name with extension
          $takeFile = $doc->getClientOriginalName();
          //get just file name
          $filename = pathinfo($takeFile, PATHINFO_FILENAME);
          //get just extension
          $extension = $doc->getClientOriginalExtension();
          //file name to store
          $fileNameToStore = $filename.'.'.$extension;
          //upload images
          $path = $doc->storeAs("public/journals/".$journalId, $fileNameToStore);
    }


    //email to Sumbission
    /*$data = array('email_title' => "Journal has been submitted",
                  'name' => $journal->name,
                  'email' => $journal->email,
                  'administration' => $journal->administration,
                  'department' => $journal->department ,
                  'title' => $journal->title,
                  'description' => $journal->description,
                  'journal_date' => $journal->journal_date
                  );
    Mail::send('emails.Submit_Journals', $data, function($message) use($data) {
    $message->to($data['email']);
    $message->subject($data['email_title']);
    $message->from('admin@abc.com');
  });  */

    return redirect('/journals/create')->with('success', 'Journal is submitted. We will let you know if reviewer response.');
}}
