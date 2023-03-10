<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Scritto da: Antonio Gravina
 */
class Membership extends Model
{
    use HasFactory;

    protected $table = 'association_user';

    protected $fillable = [
        'user_id',
        'association_id',
        'token',
        'verified',
        'moderator',
        'created_at',
    ];
}
