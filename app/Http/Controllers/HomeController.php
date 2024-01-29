<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Board;
use App\Models\Status;
use App\Models\Task;
use App\Models\Team;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        $user = Auth::user();
        $teamsUser = $user->teams()->with('boards')->get();//Доповнюємо конструктор запитів невідкладним вибором звʼязків Board
        $tasks= Task::with('board')->get();
        $statuses = Status::all();
        $usersTask = Task::with('users')->get();
        $members = [];
        foreach ($usersTask as $item) {
            foreach ($item->users as $user) {
                $members[] = $user->name;
            }
        }
        return view('home', [
            'teams' => $teamsUser,
            'statuses' => $statuses,
            'tasks'=>$tasks,
            'members' => $members,
        ]);
    }

    public function changeLocale($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
