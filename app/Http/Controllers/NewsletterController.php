<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use PDF;

class NewsletterController extends Controller
{

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
      'regno' => 'required|string|max:15',
      'faculty' => 'required',
      'deparment' => 'required',
      'title' => 'required|string|max:30',
      'body' => 'required|string|max:50',
      'images' => 'required',
      'images.*' => 'image|max:1999',
    ]);

    //handle file upload
    $file = $request->file('images');

    //If the array is not empty
    if ($file[0] != '') {
      foreach($file as $files) {
        //get file name with extension
        $takeFile = $files->getClientOriginalName();
        //get just file name
        $filename = pathinfo($takeFile, PATHINFO_FILENAME);
        //get just extension
        $extension = $files->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //upload images
        $path = $files->storeAs("public/".$request->input('regno'), $fileNameToStore);
      }
    }

    //save data to database
    $newsletter = new Newsletter;
    $newsletter->name = $request->input('name');
    $newsletter->register_num = $request->input('regno');
    $newsletter->faculty = $request->input('faculty');
    $newsletter->department  = $request->input('deparment');
    $newsletter->title = $request->input('title');
    $newsletter->body = $request->input('body');
    $newsletter->cover_image  = $fileNameToStore;
    $newsletter->save();
    return redirect('/newsletters')->with('success', 'Newsletter is submitted.');
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
      $pdf = PDF::loadView('newsletter.pdf', compact('newsletter'));
      $newsletterName = $newsletter->title;
      return $pdf->download("$newsletterName.pdf");
    }

}
