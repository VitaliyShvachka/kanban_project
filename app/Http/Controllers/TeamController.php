<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamAddUserStoreForm;
use App\Http\Requests\TeamStoreForm;
use App\Models\Team;
use App\Models\TeamUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * displays the command creation form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function create()
    {
        return view('team.create');
    }

    /**
     *  Saves the data of the created command
     * @param TeamStoreForm $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeamStoreForm $request)
    {
        $user = Auth::user();
        $team = $user->teamOwner()->create([
            'name' => $request->name
        ]);
        return redirect()->route('team.adduser', $team);
    }

    /**
     *   displays the form for adding new users to the team
     * @param Request $request
     * @param Team $team
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function addUser(Request $request, Team $team)
    {
        return view('team.adduser', ['team'=>$team]);
    }

    /**
     *  Saving commands to the new user's database
     * @param TeamAddUserStoreForm $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function teamUserStore(TeamAddUserStoreForm $request)
    {
        $this->authorize('owner-team', $request->team_id); // політика провайдер
        $user = User::where('login', $request->login)->firstOrFail(); // Отримуємо користувача з логіну з таблиці users
        // Перевіряємо, чи існує у користувача пов'язана команда із зазначеним team_id
        if ($user->teams()->where('team_id', $request->team_id)->exists()) {
             return redirect()->back()->withErrors(['user_login' => trans('validation.custom.user_teams.unique_team')])->withInput();
        } else {
            TeamUser::create([
                'team_id' => $request->team_id,
                'user_id' => $user->id,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Method for auto-selection of logins
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocomplete(Request $request)
    {
        $term = $request->term;
        $users = User::where('login', 'like', '%' . $term . '%')->pluck('login');
        return response()->json($users);
    }
}