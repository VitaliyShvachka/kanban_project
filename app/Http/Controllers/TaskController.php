<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Task;
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
    public function update(Task $task)
    {
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
     * @throws AuthorizationException
     */
    public function destroy(Task $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect()->back();
    }
}
