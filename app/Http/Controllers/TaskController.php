<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Task;
use App\Models\Team;
use Auth;
use Beta\B;
use Illuminate\Http\Request;

use App\Http\Requests;

class TaskController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Board $board)
    {
        $board = $board->team()->with('users')->get();
        $board_id = $board->toArray();
        return view('tasks.create', ['board' => $board, 'board_id'=>$board_id[0]['id']]);
    }


    public function store(Request $request)
    {

        $task = new Task();
        $task->status_id = 1;
        $task->board_id = $request->board_id;
        $task->fill($request->all());
        $task->save();
        $task->users()->attach($request->input('members'));
        return redirect()->route('main');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($task)
    {
        $task = Task::findOrFail($task);
        $status = $task->status_id;
        if ($status < 3) {
            $task->update([
                'status_id' => $status + 1,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($task)
    {
        $task = Task::findOrFail($task);
        $task->delete($task);
        return redirect()->back();

    }
}
