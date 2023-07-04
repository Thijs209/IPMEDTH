<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pop() 
    {
        return $this->belongsTo(Pop::class);
    }

    public function goalSteps()
    {
        return $this->hasMany(GoalStep::class);
    }
}
