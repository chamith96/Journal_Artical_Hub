<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use PDF;

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
    $newsletter = Newsletter::all();
    return view('newsletter.newsletter')->with('newsletter',$newsletter);
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
      'department' => 'required|string',
      'title' => 'required|string|max:30',
      'description' => 'required|string|max:50',
      'images' => 'required',
      'images.*' => 'image|max:1999',
    ]);

    //handle file upload
    if ($request->hasFile('images')) {
      $files = $request->file('images');
        foreach($files as $file) {
          //get file name with extension
          $takeFile = $file->getClientOriginalName();
          //get just file name
          $filename = pathinfo($takeFile, PATHINFO_FILENAME);
          //get just extension
          $extension = $file->getClientOriginalExtension();
          //file name to store
          $fileNameToStore = $filename.'_'.date('D M Y').'.'.$extension;
          //upload images
          $path = $file->storeAs("public/".$request->input('name').'_'.date('Y-m-d, h-i-s'), $fileNameToStore);
      }
    }

    //save data to database
    $newsletter = new Newsletter;
    $newsletter->name = $request->input('name');
    $newsletter->email = $request->input('email');
    $newsletter->department = $request->input('department');
    $newsletter->title = $request->input('title');
    $newsletter->description = $request->input('description');
    $newsletter->save();
    return redirect('/newsletters/create')->with('success', 'Newsletter is submitted.');
    }

    public function show($id)
    {
    $newsletter = Newsletter::find($id);
    return view('newsletter.newsletterShow')->with('newsletter', $newsletter);
    }

    //download note pdf file
    public function downloadPDF($id)
    {
      $newsletter = Newsletter::find($id);
      $pdf = PDF::loadView('newsletter.pdf', compact('newsletter')); //path to user view pdf
      $newsletterName = $newsletter->title;
      return $pdf->download("$newsletterName.pdf");
    }

}
