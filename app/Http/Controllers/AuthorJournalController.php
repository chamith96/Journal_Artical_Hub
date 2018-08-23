<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Journal;
use App\User;

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
  return view('journal.journal')->with('journal', $user->journals); //$user->notes ;notes is User model function, not database field
}

//show journal details to user
  public function show($id)
{
    $journal = Journal::find($id);
    if(auth()->user()->id == $journal->user_id){
      return view('journal.Journalshow')->with('journal', $journal);
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
    $request->validate([
      'name' => 'required|string|min:5|max:50',
      'email' => 'required|string|email|max:100',
      'title' => 'required|string|max:30',
      'description' => 'required|string|max:50',
      'journal_date' => 'required',
      'image1' => 'image|max:1999',
      'image2' => 'image|max:1999',
      'image3' => 'image|max:1999',
      'pdf' => 'required|mimes:pdf|max:1999',
      'doc' => 'required|mimes:doc,docx|max:1999'
    ]);

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
          $fileNameToStore = $filename.'.'.$extension;
          //upload images
          $path = $file1->storeAs("public/journals/".$request->input('name'), $fileNameToStore);
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
          $fileNameToStore = $filename.'.'.$extension;
          //upload images
          $path = $file2->storeAs("public/journals/".$request->input('name'), $fileNameToStore);
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
          $fileNameToStore = $filename.'.'.$extension;
          //upload images
          $path = $file3->storeAs("public/journals/".$request->input('name'), $fileNameToStore);
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
          $path = $pdf->storeAs("public/journals/".$request->input('name'), $fileNameToStore);
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
          $path = $doc->storeAs("public/journals/".$request->input('name'), $fileNameToStore);
    }

    //save data to database
    $journal = new Journal;
    $journal->name = $request->input('name');
    $journal->email = $request->input('email');
    $journal->administration = $request->input('administration');
    $journal->department = $request->input('department');
    $journal->title = $request->input('title');
    $journal->description = $request->input('description');
    $journal->journal_date = $request->input('journal_date');
    $journal->image1 = $path;
    $journal->image2 = $path;
    $journal->image3 = $path;
    $journal->pdf = $path;
    $journal->doc = $path;
    $journal->user_id = auth()->user()->id;
    $journal->save();

    //email to Sumbission
    /*
    $data = array('name' => $newsletter->name,
                  'email' => $newsletter->email,
                  'administration' => $newsletter->administration,
                  'department' => $newsletter->department ,
                  'title' => $newsletter->title,
                  'description' => $newsletter->description,
                  'newsletter_date' => $newsletter->newsletter_date
                  );
    Mail::send('emails.Submit_Newsletters', $data, function($message) use($data) {
    $message->to($data['email']);
    $message->subject($data['name'],
                      $data['administration'],
                      $data['department'],
                      $data['title'],
                      $data['description'],
                      $data['newsletter_date']
                      );
    $message->from('aa@aa.com');
  }); */

    return redirect('/journals/create')->with('success', 'Journal is submitted. Please check your email.');
}}
