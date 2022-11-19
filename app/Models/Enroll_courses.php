<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;



class Enroll_courses extends Model
{
    use HasFactory;
    
    public function courses()
    {
        return $this->belongsTo('\App\Courses::class', 'courses_id');
    }
}
