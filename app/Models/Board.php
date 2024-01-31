<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Board extends Model
{
    protected $fillable = ['title', 'team_id'];
    public $timestamps = false;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
