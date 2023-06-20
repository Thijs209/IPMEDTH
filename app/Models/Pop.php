<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evaluation;
use App\Models\EvaluationNote;
use App\Models\User;
use App\Models\Task;
use App\Models\TaskNotes;

class Pop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'evaluated_by', 'evaluation_finished'];
 
    // CONTENT RELATED RELATIONSHIPS
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    // ACTION RELATED RELATIONSHIPS
    public function evaluation(){
        return $this->hasMany(Evaluation::class);
    }

    public function evaluationNotes(){
        return $this->hasMany(EvaluationNote::class);
    }
    
    

    // USER RELATED RELATIONSHIPS
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function evaluatedBy(){
        return $this->belongsTo(User::class, 'evaluated_by');
    }

}