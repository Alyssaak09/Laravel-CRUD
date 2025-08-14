<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professors extends Model
{
    /** @use HasFactory<\Database\Factories\ProfessorsFactory> */
    use HasFactory;

    protected $table = 'professors';

    protected $fillable = [
        'name',
    ];
    
}
