<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','user_id'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'teams_user', 'team_id', 'user_id');
    }
}
