<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Attendance;
use DB;

class AttendanceController extends Controller
{
    
    public function attendance_manage()
    {
        $courses = Course::orderBy('id', 'desc')->where('status', '1')->get();
        $semesters = Semester::orderBy('id', 'asc')->where('status', '1')->get();
        return view('backend.pages.setup.attendance.manage', compact('courses', 'semesters'));
    }

    public function attendance_take(Request $request)
     {
        $students = Student::orderBy('student_id', 'asc')->where('course_id',$request->id)->get();

        return view('backend.pages.setup.attendance.create', compact('students'));
     }

     public function attendance_store(Request $request){
        $this->validate(
            $request,
            [
                'date'          => 'required',

            ],
            [
                'date.required'          => 'Please Select Date',
            ]
        );

        $countSt = count($request->student_id);
        for( $i=0 ; $i<$countSt ; $i++ ){
            $attend_status = 'attend_status'.$i;

            $attend = new Attendance();
            $attend->date               = date('Y-m-d', strtotime( $request->date ) );
            $attend->course_id          = $request->courseId;
            $attend->student_id         = $request->student_id[$i];
            $attend->attend_status      = $request->$attend_status;

            //  dd($attend);
            //  exit();
             $attend->save();
        }

        $notification = array(
            'message' => 'Take Attendance Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('attendance.manage')->with($notification);
     }


    //  public function previousRecords(Request $req)
    // {
    //     return view('backend.pages.setup.newattendance.previous_records')->with('cid',$req->id);

    // }


    public function previous_attendance_manage( Request $request){
        $attendances = Attendance::select('date')->groupBy('date')->where('course_id', $request->id)->orderBy('date', 'desc')->get();
        // dd($attendaces);
        // exit();
        return view('backend.pages.setup.attendance.previous_attendance_manage',  compact('attendances'));
    }

    public function previous_attendance_edit(Request $request, $date){
        
        $data['attendance']     = Attendance ::orderBy('student_id', 'asc')->where('date',$date)->get();
        $data['student']        = Student::orderBy('student_id', 'asc')->where('student_id', 'student_id')->get();
        return view('backend.pages.setup.attendance.previous_attendance_edit', $data);
    }


    public function previous_attendance_update(Request $request){
        
        
        Attendance::where('date', date('Y-m-d', strtotime( $request->date ) ))->delete();
        $countSt = count($request->student_id);
        for( $i=0 ; $i<$countSt ; $i++ ){
            $attend_status = 'attend_status'.$i;

            $attend = new Attendance();
            $attend->date               = date('Y-m-d', strtotime( $request->date ) );
            $attend->course_id          = $request->courseId;
            $attend->student_id         = $request->student_id[$i];
            $attend->attend_status      = $request->$attend_status;

            //  dd($attend);
            //  exit();
             $attend->save();
        }

        $notification = array(
            'message' => ' Attendance Data Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }


    public function search_attendance($id){
        $student = Student::find($id);
        $course = Course::find($id);
        return view('backend.pages.setup.attendance.search_attendence', compact('course', 'student'));
    }

    public function show_search_attendance(Request $request){
        $students = Student::orderBy('student_id', 'asc')->where('course_id', $request->id)->get();
      
        //    $data['present'] = NewAttendence::with(['student_name'])->where('attend_status', 'Present')->whereBetween('date',[$request->dateFrom ,$request->dateTo])->get()->count();

        $attendence_tbl = Attendance::where('course_id', $request->id)->first();
        //$abc_attendence_table = $attendence_tbl->new_attendences;
        $attendance = DB::table('attendances')
                ->whereBetween('date',[$request->dateFrom ,$request->dateTo])
                ->get();
        $stud_attend = DB::table('attendances')
                ->whereBetween('date',[$request->dateFrom ,$request->dateTo])
                ->get();
        foreach($students as $student){
            $cunt1 = DB::table('attendances')
                ->where('student_id', $student->student_id)
                ->whereBetween('date',[$request->dateFrom ,$request->dateTo]) 
                ->where('attend_status','Present')->get()
                ->count();
            $cunt0 = DB::table('attendances')
                ->where('student_id',$student->student_id)
                ->whereBetween('date',[$request->dateFrom ,$request->dateTo]) 
                ->where('attend_status','Absent')->get()
                ->count(); 
       
        }
        // dd($count1);
        // exit();
        return view('backend.pages.setup.attendance.search_view_attendence', compact('students', 'stud_attend','cunt1', 'cunt0'));
    }

}