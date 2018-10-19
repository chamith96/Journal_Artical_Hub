<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Newsletter;
use App\Journal;
use App\Reviewer;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userShow = User::count();
        $newsletterShow = Newsletter::count();
        $journalShow = Journal::count();
        $reviewerShow = Reviewer::count();

        return view('admin/dashboard',  compact('userShow', 'newsletterShow', 'journalShow', 'reviewerShow'));
    }

}
