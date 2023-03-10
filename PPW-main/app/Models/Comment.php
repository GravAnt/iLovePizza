<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Scritto da: Marco Pernisco
 */
class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'recipe_id',
        'description',
        'created_at',
        'updated_at',
    ];

    //Relazione 1 a molti inversa con Recipe
    public function recipe()
    {
        return $this->belongsTo('App\Models\Recipe', 'recipe_id');
    }

    //Relazione 1 a 1 inversa con User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}