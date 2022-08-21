<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Student;
use App\Models\Attendence;

class SetupController extends Controller
{
    public function setup_view(){
        
        return view('backend.pages.setup.view');
    }

    
    
    
     
     public function submitP(Request $req)
     {
       $at = new Attendence();
       $at->name=$req->name;
       $at->student_id=$req->student_id;
       $at->cgpa =$req->cgpa;
       $at->date= $req->date;
       $at->presence=$req->presence;
       $at->course_id=$req->courseId;
       $at->save();
      
    
     return redirect()->route('takeAttendance',['date'=>$req->date,'id'=>$req->courseId]);
    

     }
    
     public function attendence(Request $request)
     {
       
        $date = $request->attendance_date;
        $id = $request->course_id;

        return redirect()->route('takeAttendance',['date'=>$date,'id'=>$id]);
        
     }
   
     
    public function semester_manage()
    {
        $semesters = Semester::orderBy('id', 'desc')->get();
        return view('backend.pages.setup.semester.manage', compact('semesters'));
    }

    public function semester_store(Request $request)
    {
        $validate = $request->validate(
            [
                'name'=>'required|unique:semesters',
                'status'=>'required',

             ],
            [
                'name.required'=>'Please Input Semester Name',
                'status.required'=>'Please Input The Status',
            ]
        );
        $semester = new Semester();
        $semester->name         = $request->name;
        $semester->status       = $request->status;
        // dd($semester);
        // exit();
        $semester->save();

        $notification = array(
            'message' => 'Data Intert Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function semester_update(Request $request, $id)
    {
        $semester = Semester::find($id);

        if( !is_null( $semester )){
            $validate = $request->validate(
                [
                    'name'=>'required',
                    'status'=>'required',
    
                 ],
                [
                    'name.required'=>'Please Input Semester Name',
                    'status.required'=>'Please Input The Status',
                ]
            );
            $semester->name         = $request->name;
            $semester->status       = $request->status;
            // dd($semester);
            // exit();
            $semester->save();
    
            $notification = array(
                'message' => 'Data Update Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);

        }
    }

    public function semester_delete(Request $request, $id)
    {

        $semesters = Semester::find($id);
        if( !is_null($semesters) ){
            $semesters->status = $request->status; 
            $semesters->save();
            $notification = array(
                'message' => 'Data Delete Successfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);

        }
        else{
            
        }
    }

    public function course_manage()
    {
        $courses = Course::orderBy('id', 'desc')->get();
        $semesters = Semester::orderBy('id', 'asc')->where('status', '1')->get();
        return view('backend.pages.setup.course.manage', compact('courses', 'semesters'));
    }

    public function course_store(Request $request)
    {
        $validate = $request->validate(
            [
                'name'=>'required|unique:courses',
                'semester_id'=>'required',
                'status'=>'required',

             ],
            [
                'name.required'=>'Please Input Course Name',
                'name.unique'=>'This Course has been already Taken',
                'semester_id.required'=>'Semester Name is required',
                'status.required'=>'Please Input The Status',
            ]
        );
        $course = new Course();
        $course->name         = $request->name;
        $course->slug         = Str::slug($request->name);
        $course->semester_id  = $request->semester_id;
        $course->status       = $request->status;
        // dd($course);
        // exit();
        $course->save();

        $notification = array(
            'message' => 'Data Intert Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function course_update(Request $request, $id)
    {
        $course = Course::find($id);
        
        if( !is_null( $course )){
            $validate = $request->validate(
                [
                    'name'=>'required',
                    'semester_id'=>'required',
                    'status'=>'required',
    
                 ],
                [
                    'name.required'=>'Please Input course Name',
                    'semester_id.required'=>'Please Input The Semester',
                    'status.required'=>'Please Input The Status',
                ]
            );
            $course->name         = $request->name;
            $course->semester_id  = $request->semester_id;
            $course->status       = $request->status;
            // dd($course);
            // exit();
            $course->save();
    
            $notification = array(
                'message' => 'Data Update Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);

        }
    }

    public function course_delete(Request $request, $id)
    {

        $courses = Course::find($id);
        if( !is_null($courses) ){
            $courses->status = $request->status; 
            $courses->save();
            $notification = array(
                'message' => 'Data Delete Successfully',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);

        }
        else{
            
        }
    }
    
}
