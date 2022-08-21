@extends ('backend.layout.template')

@section ('body-content')
     <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <!-- <div class="page-wrapper"> -->
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb" style="padding-top: 15px;">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard <i class="fas fa-arrow-right"></i> Semester Management</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}" style="font-size: larger; color: midnightblue;"><i class="fas fa-angle-double-right">Back </i>
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- ////// -->
                <div class="text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" 
                        data-toggle="modal" data-target="#exampleCreate">
                        Add Semester
                    </button>
                        @error('name')
                        <div>
                            <div class="alert alert-danger error error-msg">
                                <ul>
                                   <li>{{$message}}</li>
                                </ul>
                            </div>
                        </div>
                        
                        @enderror
                        @error('status')
                            <div>
                                <div class="alert alert-danger error error-msg">
                                    <ul>
                                    <li>{{$message}}</li>
                                    </ul>
                                </div>
                            </div> 
                        @enderror
                    <!-- Modal -->
                    <div class="modal fade" id="exampleCreate" tabindex="-1" aria-labelledby="exampleModalLabelCreate" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="background-color: #add8e6!important;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabelCreate">Add Semester</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('semester.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4 text-right control-label col-form-label">Semester Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name"  value="{{old('name')}}" class="form-control" id="fname" autocomplete="off" placeholder="Semester Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4 text-right control-label col-form-label">Semester Status</label>
                                        <div class="col-sm-8">
                                            <select class=" form-control" name="status">
                                                <option selected disabled value="">Please Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Publish Now</button>
                                </div>
                            </form>
                            </div>
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
                                <h5 class="card-title text-center">All Semesters</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#Sl.</th>
                                                <th>Semester Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $s = 1 @endphp
                                            @foreach( $semesters as $semester)
                                            <tr>
                                                <td>{{ $s }}</td>
                                                <td>{{ $semester->name }}</td>
                                                <td class="text-center">
                                                @if ( $semester->status == 0 )
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @elseif ( $semester->status == 1 )
                                                    <span class="badge badge-pill badge-info">Active</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update">
                                                        <i data-toggle="modal" data-target="#exampleUpdate{{ $semester->id }}" class="mdi mdi-check"></i>
                                                    </a>
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i data-toggle="modal" data-target="#exampleDelete{{$semester->id}}" class="mdi mdi-close"></i>
                                                    </a>     
                                                 </td>
                                                  <!-- Update Modal -->
                                                    <div class="modal fade" id="exampleUpdate{{$semester->id}}" tabindex="-1" aria-labelledby="exampleModalLabelUpdate" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabelUpdate">Update Semester</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('semester.update', $semester->id) }}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <label for="fname" class="col-sm-4 text-right control-label col-form-label">Semester Name</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="name"  value="{{ $semester->name }}" class="form-control" id="fname" autocomplete="off" placeholder="Semester Name Here">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="fname" class="col-sm-4 text-right control-label col-form-label">Semester Status</label>
                                                                        <div class="col-sm-8">
                                                                            <select class=" form-control" name="status">
                                                                                <option selected disabled value="">Please Select Status</option>
                                                                                <option value="1" @if ( $semester->status == 1 ) selected @endif >Active</option>
                                                                                <option value="0" @if ( $semester->status == 0 ) selected @endif >Inactive</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-info">Update Now</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="exampleDelete{{$semester->id}}" tabindex="-1" aria-labelledby="exampleModalLabelDelete" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabelDelete">Delete Semester</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                                <div class="modal-body">
                                                                    <h6 class="text-danger">Are Yoy Sure Delete This Semester...???
                                                                    </h6> 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <form action="{{ route('semester.delete', $semester->id) }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="status" value=0>
                                                                    <button type="submit" class="btn btn-danger">Delete Now</button>
                                                                    </form>
                                                                </div>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
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