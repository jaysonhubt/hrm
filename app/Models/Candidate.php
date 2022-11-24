<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'phone_number', 
        'dob', 
        'address', 
        'cv_url',
        'experience'
    ];
}
