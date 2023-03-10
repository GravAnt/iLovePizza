<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * Predefinito di Breeze e modificato da: Antonio Gravina, Marco Pernisco, Mattia Siragusa
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'role',
        'created_at',
        'reset_password_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    //Relazione polimorfica 1 a 1 con Photo
    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'coverable');
    }

    //Relazione molti a molti con Association per trovare le associazioni a cui un utente è iscritto
    public function associations()
    {
        return $this->belongsToMany('App\Models\Association', 'association_user')->withPivot(['token', 'verified', 'moderator']);
    }

    //Relazione 1 a 1 con Association per trovare l'associazione che l'utente ha fondato
    public function associationFounded()
    {
        return $this->hasOne('App\Models\Association', 'founder');
    }

    //Relazione 1 a molti con Comment
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'user_id');
    }

    //Relazione 1 a molti con Recipe
    public function recipes()
    {
        return $this->hasMany('App\Models\Recioe', 'user_id');
    }

}