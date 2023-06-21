<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationNoteType extends Model
{
    use HasFactory;

    protected $table = 'evaluation_note_types';

    public function evaluationNotes()
    {
        return $this->hasMany(EvaluationNote::class);
    }
}
