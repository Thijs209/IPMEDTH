<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evaluation;

class pop extends Model
{
    use HasFactory;

    public function evaluation(){
        return $this->hasMany(Evaluation::class);
    }
}