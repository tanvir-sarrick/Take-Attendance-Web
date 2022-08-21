<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewAttendence extends Model
{
    use HasFactory;

    public function student_name(){
        return $this->belongsTo(Student::class,'student_id','student_id');
    }
}
