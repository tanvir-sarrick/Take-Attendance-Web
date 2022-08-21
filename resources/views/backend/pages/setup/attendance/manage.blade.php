@extends ('backend.layout.template')

@section ('body-content')
     <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="page-wrapper"> -->
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard <i class="fas fa-arrow-right"></i> Attendance Management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a href="{{ route('dashboard') }}"  style="font-size: larger; color: midnightblue;"><i class="fas fa-angle-double-right">Back </i>
                                    </a>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="background-color: silver;">
                            <h5 class="card-title text-center">Attendance Management</h5>
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#Sl.</th>
                                                <th>Course Name</th>
                                                <th>Semester Name</th>
                                                <th>Attendance</th>
                                                <th>Previous Attendance</th>
                                                <th>Attendance Records</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $s = 1 @endphp
                                            @foreach( $courses as $course)
                                            <tr>
                                                <td>{{ $s }}</td>
                                                <td>{{ $course->name }}</td>
                                                <td>
                                                   {{ $course->semester_name->name }}
                                                </td>
                                                 <td>
                                                    <a class="btn btn-primary" href="{{route('attendance.take', $course->id) }}">Take Attendance</a>     
                                                 </td>
                                                 <td>
                                                    <a class="btn btn-success" href="{{ route('previous.attendance_manage', $course->id) }}">Previous Attendance</a>
                                                  </td>
                                                  <td>
                                                        <a class="btn btn-warning" href="{{ route('search.attendance', $course->id) }}">Search Records</a>
                                                  </td>
                                            </tr>
                                                @php $s++ @endphp
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