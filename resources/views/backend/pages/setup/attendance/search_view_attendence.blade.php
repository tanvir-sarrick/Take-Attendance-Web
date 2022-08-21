

@extends ('backend.layout.template')

@section ('body-content')
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a href="{{ route('attendance.manage') }}"  style="font-size: larger; color: midnightblue;"><i class="fas fa-angle-double-right">Back </i>
                                    </a>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /// -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="background: #5f9ea085;">
                            <div class="card-body">
                                <h5 class="card-title">Take Attendance</h5><br>

                                <div class="table-responsive">
                                        <table id="" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Student ID</b></th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Student Name</b></th>
                                                    <th colspan="12" class="text-center" style="vertical-align: middle;"><b>Attendance Status</b></th>
                                                </tr>
                                                <!-- <tr>
                                                    <th class="text-center btn present_all" style="    display: table-cell; background: violet;">Present</th>
                                                    <th class="text-center" style="display: table-cell; background: #cccccce8;">Absent</th>
                                                </tr> -->
                                            </thead>
                                            <tbody>
                                           
                                                @foreach ( $students as $key => $student)
                                                                
                                                    @if($student->student_name -> student_id)
                                                        <tr>
                                                            <td>{{ $student->student_id }}</td>
                                                            <td>{{ $student->name }}</td>
                                                                @foreach($stud_attend as $stud_attends)
                                                                    @if($student->student_id ==          $stud_attends->student_id)  
                                                                        @if($stud_attends->attend_status == 'Present')
                                                                            <td><font color="green" size="3">
                                                                            
 p

                                                                            </font></td>
                                                                        @elseif($stud_attends->attend_status == 'Absent')
                                                                            <td><font color="red" size="3">a</font></td>   
                                                                        @endif
                                                                        
                                                                    @endif  
                                                                                
                                                                @endforeach
                                                            
                                                        </tr>          
                                                    
                                                    @endif                 
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                

                            </div>
                        </div>
                    </div> 
                </div>  
            </div>
                
    @endsection

 
    



    