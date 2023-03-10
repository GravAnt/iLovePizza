<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Scritto da: Antonio Gravina
 */
class Association extends Model
{
    use HasFactory;

    protected $table = 'associations';

    protected $fillable = [
        'name',
        'founder',
        'created_at',
        'updated_at',
    ];

    //Relazione polimorfica 1 a 1 con Photo
    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'coverable');
    }

    //Relazione molti a molti con User
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'association_user')->withPivot(['token', 'verified', 'moderator']);
    }

    //Relazione 1 a 1 inversa con User
    public function getFounder()
    {
        return $this->belongsTo('App\Models\User', 'founder');
    }

    //Relazione molti a molti con Pizza
    public function pizzas()
    {
        return $this->belongsToMany('App\Models\Pizza', 'association_pizza');
    }

    //Relazione 1 a molti con Recipe
    public function recipes()
    {
        return $this->hasMany('App\Models\Recipe', 'association_id');
    }

}