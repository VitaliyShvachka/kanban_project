<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['status_id', 'board_id', 'name', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function status()
    {
        return $this->hasMany(Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_task', 'task_id', 'user_id');
    }
}
