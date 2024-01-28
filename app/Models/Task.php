<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['status_id', 'board_id', 'name', 'description'];

    public function status()
    {
        return $this->hasMany(Status::class);
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_task', 'task_id', 'user_id');
    }
}
