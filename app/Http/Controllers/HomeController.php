<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Board;
use App\Models\Status;
use Illuminate\Contracts\View\Factory;
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
     * @return Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $statuses = Status::all();
        
        return view('home', compact('statuses', 'statuses'));
    }
}
