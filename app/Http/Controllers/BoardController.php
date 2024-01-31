<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Task;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;

use App\Http\Requests;

class BoardController extends Controller
{
  public function create(Team $team)
  {
      return view('boards.create', ['team' => $team]);
  }
  public function store(Request $request, Team $team)
  {
      // Правила валидации
      $rules = [
          'title' => 'required|string|max:255',
      ];
      // Сообщения об ошибках
      $messages = [
          'title.required' => 'Вкажіть title користувача',
          'title.string' => 'Вкажіть title команди рядком',
          'title.max' => 'title не може бути довшою ніж 255 сиимволів',
      ];
      // Валидація
      $validator = Validator::make($request->all(), $rules, $messages);
      // Проверка на наличие ошибок
      if ($validator->fails()) {
          return redirect('/board/'.$team->id.'/create')
              ->withErrors($validator, 'title')
              ->withInput();
      }
      $team = Team::find($team->id);
      $board = new Board();
      $board->title = $request->title;
      $board->team_id =$team->id;
      $board->save();
      return redirect()->route('main');
  }
    public function show(Board $board){
        $tasks= Task::with('board')->where('board_id', '=', $board->id)->get();
        $teams = Team::where('id', '=', $board->team_id)->get();
        $usersTask = Task::with('users')->get();
        $members = [];
        foreach ($usersTask as $item) {
            foreach ($item->users as $user) {
                $members[] = $user->name;
            }
        }
        return view('boards.show', [
            'board' => $board,
            'tasks' => $tasks,
            'teams' => $teams,
            'members' => $members,
        ]);
  }
}
