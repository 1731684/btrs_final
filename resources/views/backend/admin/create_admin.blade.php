@extends('layouts.backend')

@section('title', 'Create Admin')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
      </h1>
      
    </section>

    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create <strong style="color: #5fa7da">Admin</strong>&nbsp &nbsp</h3>
                </div>
               
                <div class="box-body"> 
                <form action="{{route('storeAdmin')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12" align="center">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        
                                            <div class="fileupload-new thumbnail" style="width: 150px; height:100px;">
                                                <img src="{{ url('/backend/images/avatar.png') }}"/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="width: 150px; height:100px;">
                                            </div>
                                       
												<span class="btn btn-file" style="margin-top: 30px">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image" required/>
                                                </span>
                                            {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                        
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>    
                       
                    <div class="form-group">
                        <div class="row">    
                            <div class="col-md-3"><strong>Email : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" placeholder="Email" required>
                                <small class="text text-danger">{{$errors->first('email')}}</small>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">  
                            <div class="col-md-3"><strong>Address : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="address" placeholder="Address">
                                <small class="text text-danger">{{$errors->first('address')}}</small>
                            </div>
                        </div>
                    </div> 

                    <div class="form-group">
                        <div class="row">        
                            <div class="col-md-3"><strong>Contact</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact" placeholder="Mobile">
                                <small class="text text-danger">{{$errors->first('contact')}}</small>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">         
                            <div class="col-md-3"><strong>Password</strong></div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <small class="text text-danger">{{$errors->first('password')}}</small>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">         
                            <div class="col-md-3"><strong>Confirm Password</strong></div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">         
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <div align="center">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                        Save Changes
                                    </button>&nbsp;
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                        Cancel &nbsp;&nbsp;
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>        
@endsection