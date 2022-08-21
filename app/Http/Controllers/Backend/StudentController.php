<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Course;


class StudentController extends Controller
{
    public function student_manage(Request $request){
        $courses = Course :: where('id',$request->id)->first();
        $students = Student::orderBy('student_id', 'asc')->where('course_id',$request->id)->get();
        return view('backend.pages.setup.student.manage',compact('courses', 'students'));
    }
    public function addStudent(Request $req)
    {
       $course = Course :: where('id',$req->id)->first();

        return view('backend.pages.setup.student.addstudent')->with('course',$course);
        //return $course->id;
      
    }

    public function student_store(Request $request)
    {
        $validate = $request->validate(
            [
                'name'          => 'required',
                'student_id'    => 'required',
                'cgpa'          => ['required','regex:/[1-4]+(\.[0-9][0-9]?)?/'],
                'status'        => 'required',

             ],
            [
                
                'name.required'         => 'Student Name is required',
                'student_id.required'   => 'Student ID is required',
                'cgpa.required'         => 'Student Cgpa is required',
                'cgpa.regex'            => "Cgpa Can't be more than 4.00",
                'status.required'       => 'Student Status is required',
            ]
        );

            $st= new Student();
            $st->name           =   $request->name;
            $st->student_id     =   $request->student_id;
            $st->cgpa           =   $request->cgpa;
            $st->semester_id    =   $request->semId;
            $st->course_id      =   $request->courseId;
            $st->status         =   $request->status;

            // dd($st);
            // exit();

            $st->save(); 
            
            $notification = array(
                'message' => 'Student Intert Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    } 
    
    public function student_update(Request $request, $id)
    {
        $student = Student::find($id);

        if ( !is_null($student) ){
            $validate = $request->validate(
                [
                    'name'          => 'required',
                    'student_id'    => 'required',
                    'cgpa'          => ['required','regex:/[1-4]+(\.[0-9][0-9]?)?/'],
                    'status'        => 'required',
                ],
                [
                    'name.required'         => 'Student Name is required',
                    'student_id.required'   => 'Student ID is required',
                    'cgpa.required'         => 'Student Cgpa is required',
                    'cgpa.regex'            => "Cgpa Can't be more than 4.00",
                    'status.required'       => 'Student Status is required',
                ]
            );

            $student->name           =   $request->name;
            $student->student_id     =   $request->student_id;
            $student->cgpa           =   $request->cgpa;
            $student->semester_id    =   $request->semId;
            $student->course_id      =   $request->courseId;
            $student->status         =   $request->status;

            // dd($student);
            // exit();

            $student->save();
            $notification = array(
                'message' => 'Student Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);

        }
        else{

        }
        
    } 

    public function student_delete(Request $request, $id)
    {
        $student = Student::find($id);

        if ( !is_null($student) ){
            $student->delete();
            $notification = array(
                'message' => 'Student delete Successfully',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
        else{
            
        }
        
    }
     
}   

