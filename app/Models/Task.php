<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /* Relationships */

    public function pop()
    {
        return $this->belongsTo(Pop::class);
    }

    public function taskNotes()
    {
        return $this->hasMany(TaskNotes::class);
    }
    

}