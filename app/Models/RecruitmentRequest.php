<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'position', 
        'description', 
        'quantity', 
        'jd_url', 
        'start_time', 
        'end_time'
    ];
}
