<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use PDF;
use Zipper;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth:admin', ['except'=>['create','store']]);
  }

  public function index()
  {
    $newsletter = Newsletter::orderBy('created_at', 'desc')->paginate(5);
    return view('admin.newsletter.newsletter')->with('newsletter',$newsletter);
  }

  public function show($id)
  {
  $newsletter = Newsletter::find($id);
  return view('admin.newsletter.newsletterShow')->with('newsletter', $newsletter);
  }

  public function create()
  {
  return view('newsletter.newsletterCreate');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|min:5|max:50',
      'email' => 'required|string|email|max:100',
      'title' => 'required|string|max:30',
      'description' => 'required|string|max:50',
      'newsletter_date' => 'required',
      'image1' => 'required|image|max:1999',
      'image2' => 'image|max:1999',
      'image3' => 'image|max:1999',
      'image4' => 'image|max:1999',
    ]);

    //save data to database
    $newsletter = new Newsletter;
    $newsletter->name = $request->input('name');
    $newsletter->email = $request->input('email');
    $newsletter->administration = $request->input('administration');
    $newsletter->department = $request->input('department');
    $newsletter->title = $request->input('title');
    $newsletter->description = $request->input('description');
    $newsletter->newsletter_date = $request->input('newsletter_date');
    $newsletter->save();

    //get newsletterID
    $newsletterID = $newsletter->id;

    //handle file 1 upload
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
          $path = $file1->storeAs("public/newsletters/".$newsletterID, $fileNameToStore);
    }
    //handle file 2 upload
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
          $path = $file2->storeAs("public/newsletters/".$newsletterID, $fileNameToStore);
    }
    //handle file 3 upload
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
          $path = $file3->storeAs("public/newsletters/".$newsletterID, $fileNameToStore);
    }
    //handle file 4 upload
    if ($request->hasFile('image4')) {
      $file4 = $request->file('image4');
          //get file name with extension
          $takeFile = $file4->getClientOriginalName();
          //get just file name
          $filename = pathinfo($takeFile, PATHINFO_FILENAME);
          //get just extension
          $extension = $file4->getClientOriginalExtension();
          //file name to store
          $fileNameToStore = $filename.'.'.$extension;
          //upload images
          $path = $file4->storeAs("public/newsletters/".$newsletterID, $fileNameToStore);
    }

    //email to Sumbission
    /*$data = array('id' => $newsletter->id,
                  'name' => $newsletter->name,
                  'email' => $newsletter->email,
                  'administration' => $newsletter->administration,
                  'department' => $newsletter->department ,
                  'title' => $newsletter->title,
                  'description' => $newsletter->description,
                  'newsletter_date' => $newsletter->newsletter_date
                  );
    Mail::send('emails.Submit_Newsletters', $data, function($message) use($data) {
    $message->to($data['email']);
    $message->subject($data['id'],
                      $data['name'],
                      $data['administration'],
                      $data['department'],
                      $data['title'],
                      $data['description'],
                      $data['newsletter_date']
                      );
    $message->from('aa@aa.com');
  }); */

    return redirect('/newsletters/create')->with('success', 'Newsletter is submitted. Please check your email.');
    }

    //download newsletters pdf file
    public function downloadPDF($id)
    {
      $newsletter = Newsletter::find($id);
      $pdf = PDF::loadView('newsletter.newsletterPDF', compact('newsletter')); //path to user view pdf
      $newsletterID = $newsletter->id;
      return $pdf->download("Newsletter "."$newsletterID.pdf");
    }

    //zip download
    public function downloadZip($id)
    {
      $newsletter = Newsletter::find($id);
      $files = glob(public_path("storage/newsletters/"."$newsletter->id"."/*"));
      Zipper::make(public_path("storage/newsletters/"."$newsletter->id"."/Newsletter "."$newsletter->id".".zip"))->add($files)->close();

      //return response()->download(public_path("storage/newsletters/"."$newsletter->id"."/Newsletter "."$newsletter->id".".zip"))->deleteFileAfterSend(true);
      return response()->download(public_path("storage/newsletters/"."$newsletter->id"."/Newsletter "."$newsletter->id".".zip"));
    }

}
