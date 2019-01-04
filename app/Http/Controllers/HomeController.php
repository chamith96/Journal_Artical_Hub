<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Journal;
use App\JournalsImage;
use DB;

class HomeController extends Controller
{
    public function index() {
      $journals = DB::table('journals')
                      ->join('journals_images','journals.id','=','journals_images.journal_id')
                      ->select('journals.created_at as jcreated_at',
                      'journals.title as jtitle', 'journals_images.image as image',
                      'journals.id as id','journals.abstract as abstract ',
                      'journals.keywords  as keywords',
                      'journals.a1fname as a1fname',
                      'journals.a1lname as a1lname')
                      ->orderBy('journals.created_at', 'desc')
                      ->paginate(3);

       return view('welcome')->with('journals',$journals);
    }
}
