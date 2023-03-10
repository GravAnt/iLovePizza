<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Scritto da: Mattia Siragusa
 */
class Pizza extends Model
{
    use HasFactory;

    protected $table = 'pizzas';

    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    //Relazione polimorfica 1 a 1 con Photo
    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'coverable');
    }

    //Relazione molti a molti con Association
    public function associations()
    {
        return $this->belongsToMany('App\Models\Association', 'association_pizza');
    }
}