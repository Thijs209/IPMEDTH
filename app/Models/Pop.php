<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evaluation;
use App\Models\CoreQuadrant;
use App\Models\EvaluationNote;
use App\Models\User;
use App\Models\Task;


class Pop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'evaluated_by', 'evaluation_finished'];
 
    // CONTENT RELATED RELATIONSHIPS
    public function task(){
        return $this->hasOne(Task::class);
    }
    
    public function coreQuadrant(){
        return $this->hasOne(CoreQuadrant::class);
    }

    public function goals(){
        return $this->hasMany(Goal::class);
    }

    public function coreQuadrants(){
        return $this->hasOne(coreQuadrant::class);
    }

    public function evaluationNotes(){
        return $this->hasMany(EvaluationNote::class);
    }

    // ACTION RELATED RELATIONSHIPS
    public function evaluation(){
        return $this->hasOne(Evaluation::class);
    }
    
    // USER RELATED RELATIONSHIPS
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function evaluatedBy(){
        return $this->belongsTo(User::class, 'evaluated_by');
    }

}