<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kernkwadrant extends Model
{
    use HasFactory;

    protected $fillable = ['pop_id', 'kern_kwaliteit', 'valkuil', 'allergie', 'uitdaging'];

    public function pop(){
        return $this->hasMany(pop::class);
    }
}