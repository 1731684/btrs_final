@extends('layouts.backend')

@section('title', 'Edit Bustype')

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
                            <h3 class="box-title">Edit <strong style="color: #5fa7da">Vechile Type</strong>&nbsp &nbsp</h3>
                        </div>

                        <div class="box-body">
                            <form action="{{route('updateBustype')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="id" value="{{$bustype->bustypes_id}}">
                                            <input type="text" class="form-control" name="bustypes_title"
                                                   value="{{ $bustype->bustypes_title }}" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="seat"
                                                   value="{{ $bustype->seat }}" required>
                                        </div>
                                    </div>
                                </div> -->

                               <!--  <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12" align="center">
                                            <div class="control-group">
                                                <div class="controls">
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail"
                                                             style="width: 700px; height:200px;">
                                                            <img src="{{ url('/img/bustype/'.$bustype->image) }}"/>
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                                             style="width: 700px; height:200px;"></div>
                                                        <div>
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

 -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div align="center">
                                                <button type="submit" class="btn btn-success"><i
                                                            class="fa fa-check"></i>&nbsp;&nbsp;
                                                    Save Changes&nbsp;&nbsp;
                                                </button>&nbsp;&nbsp;
                                                <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                                    Cancel&nbsp;&nbsp;
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