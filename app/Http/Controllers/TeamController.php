<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;

class TeamController extends Controller
{
    public function create()
    {
        $data = [];
        $data['logins'] = User::pluck('login');
        dump($data);
        return view('team.create', $data);
    }

    public function store(Request $request)
    {
        // Правила валидации
        $rules = [
            'name' => 'required|string|max:255', // Пример правила для уникального имени
        ];
        // Сообщения об ошибках
        $messages = [
            'name.required' => 'Вкажіть назву команди',
            'name.string' => 'Вкажіть назву команди одим рядком',
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
        $team = new Team();
        $team->name = $request->name;
        $team->save();

        return redirect('/')
            ->with('success', 'Команда успішно створена.');
    }
}
