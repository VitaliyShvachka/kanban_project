<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

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
     * Saves the data of the created command
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // Правила валидации
        $rules = [
            'name' => 'required|string|max:255',
        ];
        // Сообщения об ошибках
        $messages = [
            'name.required' => 'Вкажіть назву команди',
            'name.string' => 'Вкажіть назву команди рядком',
            'name.max' => 'Назва не може бути довшою ніж 255 сиимволів',
        ];
        // Валидація
        $validator = Validator::make($request->all(), $rules, $messages);
        // Проверка на наличие ошибок
        if ($validator->fails()) {
            return redirect('/team/create')
                ->withErrors($validator)
                ->withInput();
        }
        $user =Auth::user();
        $team = Team::create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
        ]);
        $id = $team->id;

        return redirect('/team/' . $id . '/adduser');
    }

    /**
     * displays the form for adding new users to the team
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function addUser(Request $request, $id)
    {
        $data = [];
        $team = Team::findOrFail($id);
        if (!$team) {
            $validator = Validator::make([], []);
            $validator->errors()->add('user_id', 'Не вірно вказаний логін користувача');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data['team_id'] = $id;
            $data['team_name'] = $team->name;
            $data['users_tiams'] = $this->getUsersWithTeams($id);
        }
        return view('team.adduser', $data);
    }

    /**
     * Saving commands to the new user's database
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function teamUserStore(Request $request)
    {
        // Правила валидации
        $rules = [
            'team_id' => 'required|int',
            'login' => 'required|string|max:255',
        ];
        // Сообщения об ошибках
        $messages = [
            'login.required' => 'Вкажіть login користувача',
            'login.string' => 'Вкажіть login команди рядком',
            'login.max' => 'login не може бути довшою ніж 255 сиимволів',
        ];
        // Валидація
        $validator = Validator::make($request->all(), $rules, $messages);
        // Проверка на наличие ошибок
        if ($validator->fails()) {
            return redirect('/team/'.$request->team_id.'/adduser')
                ->withErrors($validator)
                ->withInput();
        }
        // Получаем user_id по логину из таблицы users
        $user = User::where('login', $request->login)->first();
        // Проверяем, что пользователь с указанным логином существует
        if (!$user) {
            $validator = Validator::make([], []);
            $validator->errors()->add('user_id', 'Не вірно вказаний логін користувача');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Проверяем, существует ли уже запись с team_id и user_id
            $existingRecord = TeamUser::where('team_id', $request->team_id)
                ->where('user_id', $user->id)
                ->first();
            // Если запись не существует, добавляем новую
            if ($existingRecord) {
                $validator = Validator::make([], []);
                $validator->errors()->add('user_id', 'Цей корстувач вже доданий до цієї команди');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $authUser =Auth::user();
            $existingTeam = Team::where('user_id', $authUser->id)
                ->where('id', $request->team_id)
                ->first();

            if (!$existingTeam) {
                $validator = Validator::make([], []);
                $validator->errors()->add('user_id', 'У вас немає прав доступу до цієї команди');
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                TeamUser::create([
                    'team_id' => $request->team_id,
                    'user_id' => $user->id,
                ]);
            }
        }
        return redirect('/team/'.$request->team_id.'/adduser');
    }

    /**
     * Lists all team users
     * @param $id
     * @return User[]|array|\Illuminate\Database\Eloquent\Collection
     */
    public function getUsersWithTeams($id)
    {
        $userLogins = User::join('teams_user', 'users.id', '=', 'teams_user.user_id')
            ->where('teams_user.team_id', $id)
            ->select('users.id', 'users.name', 'users.login')
            ->get();
        if ($userLogins) {
            return $userLogins;
        } else {
            return [];
        }
    }

    /**
     * Method for auto-selection of logins
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocomplete(Request $request)
    {
        //dump($request);
        $term = $request->term;
        $users = User::where('login', 'like', '%' . $term . '%')->pluck('login');
        return response()->json($users);
    }
}