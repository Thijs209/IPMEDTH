<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Pop;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* Relationships (P*/
    public function role(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function isAdmin(){
        return $this->role_id === 1;
    }

    public function isPeopleManager(){
        return $this->role_id === 2;
    }

    public function isEmployee(){
        return $this->role_id === 3;
    }

    /* 
        All POPS relations
    */
    public function pops(){
        return $this->hasMany(Pop::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function evaluations(){
        return $this->hasMany(Evaluation::class);
    }

    public function evaluationNotes(){
        return $this->hasMany(EvaluationNotes::class);
    }

    public function evaluationNotesByPop($pop_id){
        return $this->hasMany(EvaluationNotes::class)->where('pop_id', $pop_id); // Find POPs per user and return them as a collection
    }

    

}