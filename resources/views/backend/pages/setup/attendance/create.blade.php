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
                    <div class="col-12">
                        <div class="card" style="background: #5f9ea085;">
                            <div class="card-body">
                                <form action="{{ route('attendance.store') }}" method="POST">
                                @csrf
                                    <h5 class="card-title text-center">Take Attendance</h5><br>
                                    <div class="form-group">
                                        <label for="fname" class="col-sm-4 control-label col-form-label">Select Attendance Date <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="date" name="date" class="form-control" id="fname" required="">
                                            @error('date')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Student ID</b></th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Student Name</b></th>
                                                    <th colspan="2" class="text-center" style="vertical-align: middle;"><b>Attendance Status</b></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center btn present_all" style="    display: table-cell; background: violet;">Present</th>
                                                    <th class="text-center" style="display: table-cell; background: #cccccce8;">Absent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           
                                            @foreach ( $students as $key => $student)
                                                <tr id="div{{$student->student_id}}">
                                                    <input type="hidden" name="student_id[]" value="{{ $student->student_id }}">
                                                    <input type="hidden" name="courseId" value="{{ $student->course_id }}"  placeholder=" Course ID" class="form-control">
                                                    <td>{{ $student->student_id }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td colspan="2" class="text-center">
                                                        <div class="switch-toggle switch-2 switch-candy">
                                                            <div class="col-6" style="float: left;">
                                                                <input type="radio" name="attend_status{{$key}}" value="Present" id="present{{$key}}"  required="">
                                                                <label for="present{{$key}}">Present</label>
                                                            </div>
                                                            <div class="col-6" style="float: right;">
                                                                <input type="radio" name="attend_status{{$key}}" value="Absent" id="absent{{$key}}" >
                                                                <label for="absent{{$key}}">Absent</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Publish Now</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>  
            </div>
    @foreach( $students as $student)
        {{ $student->courseId}}
    @endforeach
@endsection