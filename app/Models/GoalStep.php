<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalStep extends Model
{
    use HasFactory;

    protected $fillable = ['goal_id', 'step', 'description', 'completed'];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }
}