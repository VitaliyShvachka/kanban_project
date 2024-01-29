<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TeamAddUserStoreForm extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'team_id' => 'required|int|exists:teams,id',
            'login' => [
                'required',
                'string',
                'max:255',
                'exists:users,login',
            ],
        ];
    }
}