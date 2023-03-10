<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Scritto da: Antonio Gravina
 */
class AssociationPizza extends Model
{
    use HasFactory;

    protected $table = 'association_pizza';

    protected $fillable = [
        'association_id',
        'pizza_id',
    ];
}
