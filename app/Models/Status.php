<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function tasks()
    {
        return $this->belongsTo(Task::class);
    }
}
