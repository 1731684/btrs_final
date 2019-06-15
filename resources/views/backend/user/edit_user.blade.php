@extends('layouts.backend')

@section('title', 'Edit User')

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
                    <h3 class="box-title">Edit <strong style="color: #5fa7da">Admin</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">
                <form action="{{route('updateUser')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 150px; height:100px;">
                                                <img src="{{ url('/img/user/'.$user->image) }}"/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="width: 150px; height:100px;"></div>
                                            <div>
                                                <small class="text text-danger">{{$errors->first('image')}}</small>

                                                <span class="btn btn-file">
    												<span class="fileupload-new btn btn-primary">Select image</span>
    												<span class="fileupload-exists btn btn-info">Change</span>
                                                        <input type="file" name="image" />
                                                    </span>
                                                {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                            <input type="hidden" name="id" value="{{$user->users_id}}">

                            {{--<div class="col-md-3"><strong>Name : *</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}" required>--}}
                                {{--<small class="text text-danger">{{$errors->first('name')}}</small>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12">&nbsp;</div>--}}


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><strong>Email : *</strong></div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Email" required>
                                        <small class="text text-danger">{{$errors->first('password')}}</small>
                                    </div>    
                                </div>
                            </div>



                            {{--<div class="col-md-3"><strong>Username : *</strong></div>--}}
                            {{--<div class="col-md-9">--}}
                                {{--<input type="text" class="form-control" name="username" value="{{$user->username}}" placeholder="Username">--}}
                                {{--<small class="text text-danger">{{$errors->first('username')}}</small>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12">&nbsp;</div>--}}


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><strong>User Type:</strong></div>
                                    <div class="col-md-9 demo-radio-button">
                                        
                                        <input type="radio"  id="radio_1" class="with-gap" name="user_type" value="admin" @php if($user->user_type=='admin') echo 'checked'; @endphp>
                                        <label for="radio_1">Admin</label>


                                        <input type="radio"  id="radio_2" class="with-gap" name="user_type" value="user" @php if($user->user_type=='traveller') echo 'checked'; @endphp> <label for="radio_2">Traveller</label>

                                        <input type="radio" id="radio_3" class="with-gap" name="user_type" value="user" @php if($user->user_type=='vendor') echo 'checked'; @endphp> 
                                         <label for="radio_3">Vendor</label>
                                        <small class="text text-danger">{{$errors->first('user_type')}}</small>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div align="center">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                                Save Changes
                                            </button>&nbsp;&nbsp;
                                            <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                                Cancel&nbsp;&nbsp;
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <script src="{{ url('/backend/assets/vendor_plugins/iCheck/icheck.min.js')}}"></script>
@endsection