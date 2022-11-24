<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'candidate_id',
        'start_time',
        'end_time',
        'type',
        'link_meeting'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function candidate() {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id');
    }
}
