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
                        <h4 class="page-title">Dashboard <i class="fas fa-arrow-right"></i> Previous Attendances</h4>
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
                                <h5 class="card-title text-center">Previous Attendances List</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#Sl.</th>
                                                <th>Attendance Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @php $s = 1 @endphp
                                            @foreach( $attendances as $attendance)
                                            <tr>
                                                <td>{{ $s }}</td>
                                                <td>{{ date( 'd-m-Y', strtotime( $attendance->date ) ) }}</td>
                                                
                                               
                                                <td class="text-center">
                                                    <a href="{{ route('edit.attendance', $attendance->date) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update">
                                                        <i class="mdi mdi-check"></i>
                                                    </a>
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i data-toggle="modal" data-target="#exampleDelete{{$attendance->id}}" class="mdi mdi-close"></i>
                                                    </a>     
                                                 </td>
                                
                                                 
                                                  

                                                   
                                            </tr>
                                                @php $s++ @endphp
                                            @endforeach
                                        </tbody>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>

@endsection