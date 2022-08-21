

@extends ('backend.layout.template')

@section ('body-content')
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                    <div class="col-md-6 offset-md-3">
                        <div class="card" style="background: #5f9ea085;">
                            <div class="card-body">
                                <form action="{{route('recordAtten')}}" method="POST">
                                @csrf
                                    <h4 class="card-title text-center" style="color:Tomato">Previous Attendence Record</h4><br>
                                    <div class="form-group">
                                        <label for="fname" class="col-sm-9 control-label col-form-label">Select A Date <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="date" name="date"  value="{{old('date')}}" class="form-control" id="fname" required="">
                                            @error('date')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div>
                                        <input type="hidden" name="cid" value="{{$cid}}"  placeholder=" Course ID" class="form-control">
                                        </div>
                                    </div>

                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Go Now</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>  
            </div>

    @endsection

 
    



    