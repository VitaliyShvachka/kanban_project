<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Board extends Model
{
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
