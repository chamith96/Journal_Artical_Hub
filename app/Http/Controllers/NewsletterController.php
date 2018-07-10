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
      'image1.*' => 'required|image|max:1999',
      'image2.*' => 'required|image|max:1999',
    ]);

    //handle file1 upload
    $file1 = $request->file('image1');

    //If the array is not empty
    if ($file1[0] != '') {
      foreach($file1 as $files) {
        //get file name with extension
        $takeFile = $files->getClientOriginalName();
        //get just file name
        $filename = pathinfo($takeFile, PATHINFO_FILENAME);
        //get just extension
        $extension = $files->getClientOriginalExtension();
        //file name to store
        $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
        //upload images
        $path = $files->storeAs("public/".$request->input('regno'), $fileNameToStore1);
      }
    }

    //handle file2 upload
    $file2 = $request->file('image2');

    //If the array is not empty
    if ($file2[1] != '') {
      foreach($file2 as $files) {
        //get file name with extension
        $takeFile = $files->getClientOriginalName();
        //get just file name
        $filename = pathinfo($takeFile, PATHINFO_FILENAME);
        //get just extension
        $extension = $files->getClientOriginalExtension();
        //file name to store
        $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
        //upload images
        $path = $files->storeAs("public/".$request->input('regno'), $fileNameToStore2);
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
    $newsletter->image1  = $fileNameToStore1;
    $newsletter->image2  = $fileNameToStore2;
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
