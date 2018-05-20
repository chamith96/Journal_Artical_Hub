<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;

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
      'images' => 'required|image|max:1999'
    ]);

    //handle file upload
    if ($request->hasFile('images')) {
      //get file name with extension
      $file = $request->file('images')->getClientOriginalName();
      //get just file name
      $filename = pathinfo($file, PATHINFO_FILENAME);
      //get just extension
      $extension = $request->file('images')->getClientOriginalExtension();
      //file name to store
      $fileNameToStore = $filename.'_'.time().'.'.$extension;
      //upload images
      $path = $request->file('images')->storeAs('public/Newsletter_images', $fileNameToStore);
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
    return redirect('/newsletter')->with('success', 'Newsletter is submitted.');
  }

    public function show($id)
  {
    $newsletter = Newsletter::find($id);
    return view('newsletter.newsletterShow')->with('newsletter', $newsletter);
  }

}
