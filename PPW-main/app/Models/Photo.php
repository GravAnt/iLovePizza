<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Scritto da: Antonio Gravina, Marco Pernisco, Mattia Siragusa
 */
class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';

    protected $fillable = [
        'name',
        'size',
        'coverable_id',
        'coverable_type',
        'created_at',
        'updated_at',
    ];

    //Relazione polimorfica 1 a 1 inversa con User
    public function user()
    {
        return $this->morphTo();
    }

    //Relazione polimorfica 1 a 1 inversa con Recipe
    public function recipe()
    {
        return $this->morphTo();
    }

    //Relazione polimorfica 1 a 1 inversa con Association
    public function association()
    {
        return $this->morphTo();
    }

    //Relazione polimorfica 1 a 1 inversa con Pizza
    public function pizza()
    {
        return $this->morphTo();
    }
}