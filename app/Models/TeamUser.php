<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'teams_user';
    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'team_id',
    ];
}
