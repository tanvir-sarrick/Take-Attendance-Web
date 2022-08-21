@extends ('backend.layout.template')

@section ('body-content')

            <div class="container">
               <div class="row" style="background: blanchedalmond;">
                  <div class="col-md-6 offset-md-3" style="margin-bottom: 70px;">
                      <div class="signup-form">
                          <form Action="{{route('store.student')}}" method="POST" class="mt-5 border p-4 bg-light shadow" style="background-color: #add8e6!important;">
                          @csrf
                          
                            <h3 class="text-center"style="color:Tomato">Register A Student</h3><br>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-4 text-right control-label col-form-label">Student Name <span class="text-danger">*</span></label><br>
                                <div class="col-sm-8">
                                    <input type="text" name="name"  value="{{old('name')}}" class="form-control" id="fname" autocomplete="off"  placeholder="Student Name Here">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-4 text-right control-label col-form-label">Student ID <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="student_id"  value="{{old('student_id')}}" class="form-control" id="fname" autocomplete="off"  placeholder="Student ID Here">
                                    @error('student_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-4 text-right control-label col-form-label">Student CGPA <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="cgpa"  value="{{old('cgpa')}}" class="form-control" id="fname"autocomplete="off"  placeholder="Course CGPA Here">
                                    @error('cgpa')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            
                             <div>
                                <input type="hidden" name="semId" value="{{ $course->semester_name->id }}"  placeholder=" Semester ID" class="form-control">
                               
                                <input type="hidden" name="courseId" value="{{ $course->id }}"  placeholder=" Course ID" class="form-control">
                             </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-4 text-right control-label col-form-label">Student Status <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select class=" form-control" name="status">
                                        <option value="">Please Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                                
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Registration</button>
                            </div> 
                            </form>
                        </div>
                    </div>
                </div>
             </div>   
    


    @endsection

 
    



    