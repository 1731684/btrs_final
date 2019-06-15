@extends('layouts.backend')

@section('title', 'view Admin')

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


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail"
                                                         style="width: 150px; height:100px;">
                                                        <img src="{{ url('/img/admin/'.$admin->image) }}"/>
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail"
                                                         style="width: 150px; height:100px;"></div>
                                                    <div>
                                                        <small class="text text-danger">{{$errors->first('image')}}</small>

                                                        <span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image"/>
                                                </span>
                                                        {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="id" value="{{$admin->admins_id}}">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><strong>Address : *</strong></div>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-map"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="address"
                                                   value="{{$admin->address}}" required>
                                            <small class="text text-danger">{{$errors->first('address')}}</small>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><strong>Contact</strong></div>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="contact"
                                                   value="{{$admin->contact}}" required>
                                            <small class="text text-danger">{{$errors->first('contact')}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div align="center">
                                            <a href="{{route('admins')}}" class="btn btn-success">
                                                <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                                            </a>
                                        </div>
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