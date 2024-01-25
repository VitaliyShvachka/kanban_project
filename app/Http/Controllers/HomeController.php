<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Board;
use App\Models\Status;
use App\Models\Team;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $id = Auth::id();// Отримуємо id авторизованого користувача
        $teamsUser = User::find($id)->teams()->first();
        $teams = User::find($id)->teams()->get();//отримуємо список команд, де учасником є авторизований користувач
        $boards = Board::all();
        $statuses = Status::all();
        return view('home', compact('statuses', 'teams', 'boards'));
    }
}
