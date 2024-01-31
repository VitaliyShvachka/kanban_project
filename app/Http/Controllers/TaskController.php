<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Task;
use App\Models\Team;
use Auth;
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
     * @param Board $board
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function create(Board $board)
    {
        $members = [];
        $board = Board::findOrFail($board->id);

        $teams = $board->team()->with('users')->get();
        foreach ($teams as $team) {
            foreach ($team->users as $user) {
                $members[] = $user->name;
            }
        }
        return view('tasks.create', ['board' => $board, 'members' => $members]);
    }

    /**
     * @param Requests\TaskCreateForm $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\TaskCreateForm $request)
    {
        $task = new Task();
        $task->status_id = 1;
        $task->fill($request->all());
        $task->save();
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
