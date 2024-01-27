<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Task;
use App\Models\Team;
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
        $tasks = Task::with('users')->get();

        foreach ($tasks as $task){
            foreach ($task->users as $user){
                dump($user->name);
            }
        }
        return view('tasks.create', ['board' => $board]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TaskCreateForm $request, Board $board)
    {
        Task::create([
            'status_id' => 1,
            'board_id' => $board->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('main');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($task)
    {
        $task = Task::findOrFail($task);
        $task->delete($task);
        return redirect()->back();

    }
}
