<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    /** @use HasFactory<\Database\Factories\ProfessorsFactory> */
    use HasFactory;

    protected $table = 'professors';

    protected $fillable = [
        'name',
    ];

    public function course()
    {
    return $this->hasOne(Course::class);
    }

    
}