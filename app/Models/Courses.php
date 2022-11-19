<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use DB;

class Courses extends Model
{
    use HasFactory;
   
    public function enroll_courses()
    {
        return $this->hasMany('\App\Courses::class');
    }

    public static function getCourseName($id){
        $data = DB::table('courses')
                   ->select('course_name')
                   ->where('id' , $id)
                   ->first();
        if($data){
            return $data->course_name;
        }
        return "";
    }
   
}
