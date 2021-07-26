<?php

namespace App\Http\Controllers;

use Wink\WinkTag;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tags = WinkTag::with('posts')->orderBy('created_at', 'DESC')->get();
        return view('home', compact('tags'));
    }
}
