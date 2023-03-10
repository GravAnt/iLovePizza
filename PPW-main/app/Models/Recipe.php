<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Scritto da: Marco Pernisco
 */
class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    protected $fillable = [
        'id',
        'association_id',
        'user_id',
        'name',
        'type',
        'ingredients',
        'description',
    ];

    //Relazione polimorfica 1 a 1 con Photo
    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'coverable');

    }

    //Relazione 1 a molti con Comment
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'recipe_id');
    }

    //Relazione 1 a molti inversa con Association
    public function association()
    {
        return $this->belongsTo('App\Models\Association', 'association_id');
    }

    //Relazione 1 a molti inversa con User
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}