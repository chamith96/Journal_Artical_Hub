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

      return view('journal.Journalshow', compact('status', 'journal'));
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
    $journal->name = auth()->user()->name;
    $journal->email = auth()->user()->email;
    $journal->administration = auth()->user()->administration;
    $journal->department = auth()->user()->department;
    $journal->author = auth()->user()->author;
    $journal->title = $request->input('title');
    $journal->description = $request->input('description');
    $journal->journal_date = $request->input('journal_date');
    $journal->user_id = auth()->user()->id;
    $journal->save();

    //get journalId
    $journalId = $journal->id;

    //handle image 1 upload
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
    //handle image 2 upload
    if ($request->hasFile('image2')) {
      $file2 = $request->file('image2');
          //get file name with extension
          $takeFile = $file2->getClientOriginalName();
          //get just file name
          $filename = pathinfo($takeFile, PATHINFO_FILENAME);
          //get just extension
          $extension = $file2->getClientOriginalExtension();
          //file name to store
          $fileNameToStore =
           $filename.'.'.$extension;
          //upload images
          $path = $file2->storeAs("public/journals/".$journalId, $fileNameToStore);
    }
    //handle image 3 upload
    if ($request->hasFile('image3')) {
      $file3 = $request->file('image3');
          //get file name with extension
          $takeFile = $file3->getClientOriginalName();
          //get just file name
          $filename = pathinfo($takeFile, PATHINFO_FILENAME);
          //get just extension
          $extension = $file3->getClientOriginalExtension();
          //file name to store
          $fileNameToStore1 = $filename.'.'.$extension;
          //upload images
          $path = $file3->storeAs("public/journals/".$journalId, $fileNameToStore1);
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
