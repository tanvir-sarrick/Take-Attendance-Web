<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
    ];

    
    public function semester_name(){
        return $this->belongsTo(Semester::class,'semester_id');
    }
    public function course_name(){
        return $this->belongsTo(Course::class,'id');
    }
}
