<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pop extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'evaluated_by', 'evaluation_finished'];

    public function evaluation(){
        return $this->hasMany(Evaluation::class);
    }
}