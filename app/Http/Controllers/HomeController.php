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
                      ->select('journals.title as jtitle', 'journals_images.image as image', 'journals.id as id','journals.description as description', 'journals.name as name')
                      ->orderBy('journals.created_at', 'desc')
                      ->paginate(6);

       return view('welcome')->with('journals',$journals);
    }
}
