<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Board;

class Team extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string[]
     */
    protected $fillable = ['name','user_id'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'teams_user');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}
