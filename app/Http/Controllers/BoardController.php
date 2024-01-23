<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Boards;
use Illuminate\Http\Request;

use App\Http\Requests;

class BoardController extends Controller
{
    public function show()
    {

    }
    public function create()
    {
        $idTeam = filter_input(INPUT_GET, 'idTeam');
        return view('form', ['idTeam'=>$idTeam]);
    }
    public function save()
    {

    }
    public function store(Request $request)
    {
        $title = $request->input('title');
        $idTeam = $request->input('team_id');
        $board = new Boards();
        $board->title = $title;
        $board->team_id = $idTeam;
        $board->save();
        return redirect(route('main'));
    }
}
