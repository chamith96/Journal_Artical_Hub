<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reviewer;

class ReviewerController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }


  public function index()
  {
    $reviewer = Reviewer::orderBy('created_at', 'desc')->paginate(5);
    return view('admin.reviewer.reviewer')->with('reviewer',$reviewer);;
  }

  public function create()
  {
    return view('admin.reviewer.reviewerCreate');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|string',
      'email' => 'required|email',
      'organization' => 'required|string',
      'position' => 'required|string'
    ]);

      //create post or stored in database
      $reviewer = new Reviewer;
      $reviewer->name = $request->input('name');
      $reviewer->email = $request->input('email');
      $reviewer->organization = $request->input('organization');
      $reviewer->position = $request->input('position');
      $reviewer->save();
      return redirect('/admin/reviewers')->with('success','Reviewer Created');
  }

  public function show($id)
  {
      $reviewer = Reviewer::find($id);
      return view('admin.reviewer.reviewerShow')->with('reviewer', $reviewer);
  }

  public function edit($id)
  {
      $reviewer = Reviewer::find($id);
      return view('admin.reviewer.reviewerEdit')->with('reviewer', $reviewer);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required|string',
      'email' => 'required|email',
      'organization' => 'required|string',
      'position' => 'required|string'
    ]);

      //edit post and store in database
      $reviewer = Reviewer::find($id);
      $reviewer->name = $request->input('name');
      $reviewer->email = $request->input('email');
      $reviewer->organization = $request->input('organization');
      $reviewer->position = $request->input('position');
      $reviewer->save();
      return redirect('/admin/reviewers')->with('success','Reviewer Updated');
  }

  public function destroy($id)
  {
      $reviewer = Reviewer::find($id);
      $reviewer->delete();
      return redirect('/admin/reviewers')->with('success', 'Reviewer deleted');
  }

}
