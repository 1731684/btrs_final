@extends('layouts.backend')

@section('title', 'View Vehicle Type')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Vechile Type
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">View <strong style="color: #5fa7da">Vechile Types</strong>&nbsp &nbsp</h3>
                        </div>

                        <div class="box-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="bustypes_title" value="{{$bustype->bustypes_title}}" disabled>
                                            <strong class="text-danger">{{$errors->first('bustypes_title')}}</strong>
                                        </div>
                                    </div>
                                </div>

                           <!--      <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="seat" value="{{$bustype->seat}}"  disabled>
                                            <strong class="text-danger">{{$errors->first('seat')}}</strong>
                                        </div>
                                    </div>
                                </div>


                                <strong class="text-danger">{{$errors->first('image')}}</strong>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="width: 700px; height:200px;">
                                                            <img src="{{ url('/img/bustype/.$bustype->image') }}" />
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 700px; height:200px;"></div>
                                                        <div>
        												<span class="btn btn-file">
        												<span class="fileupload-new btn btn-primary">Select Bus map image</span>
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
                                        <div class="col-md-12">
                                            <h5><b>Note: </b>For best view, Please use the resolution of 2050*1015.</h5>
                                        </div>
                                    </div>
                                </div>
 -->

                                <div align="center">
                                    <a href="{{route('bustypes')}}" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                        Proceed
                                    </a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection