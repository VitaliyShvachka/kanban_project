<?php

namespace App;

use App\Models\Task;
use App\Models\Team;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Відношення "багато до багатьох" з явною вказівкою таблиці
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'teams_user', 'user_id', 'team_id');
    }

    /**
     * Відношення "один до багатьох" (користувач може бути власником безлічі команд)
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamOwner()
    {
        return $this->hasMany(Team::class, 'user_id');
    }

    /**
     * @param $teamId
     * @return mixed
     */
    public function isTeamOwner($teamId)
    {
        return $this->teamOwner()->where('id', $teamId)->exists();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function memberTeams()
    {
        return $this->belongsTo(Team::class, '');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'users_task', 'user_id', 'task_id');
    }
}
