<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polls = Questions::take(5)->get();
        return view('home', compact('polls'));
    }
}
