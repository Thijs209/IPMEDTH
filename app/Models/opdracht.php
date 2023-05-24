<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opdracht extends Model
{
    use HasFactory;

    protected $fillable = ['pop_id', 'opdracht_doel', 'resultaat', 'succesvol', 'leidinggevende', 'rapporteer_anderen'];

}
