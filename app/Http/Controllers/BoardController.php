<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Team;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class BoardController extends Controller
{
    public function show()
    {

    }
  public function create(Team $team)
  {

      return view('boards.create', ['team' => $team]);


  }
  public function store(Request $request, Team $team)
  {
      $team = Team::find($team->id);
      $board = new Board();
      $board->title = $request->title;
      $board->team_id =$team->id;
      $board->save();
      return redirect()->route('main');
  }
}
