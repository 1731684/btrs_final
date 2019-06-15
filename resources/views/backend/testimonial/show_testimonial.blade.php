@extends('layouts.backend')

@section('title', 'Edit Why Choose Us')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Testimonial
            </h1>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">View <strong style="color: #5fa7da">Testimonial</strong>&nbsp &nbsp</h3>
                        </div>

                        <div class="box-body">


                                <div class="row" align="center">
                                    <div class="col-md-12" align="center">
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail"
                                                         style="width: 160px; height:110px;">
                                                        <img src="{{url('/img/whyus/'.$testimonial->image) }}"/>
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail"
                                                         style="width: 160px; height:110px;"></div>
                                                    <div>
												<span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image" value=""/>
                                                </span>
                                                        {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        {{--<div class="col-md-3"><strong>Title : *</strong></div>--}}
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="title"
                                                   value="{{$testimonial->name}}" placeholder="Name" required>
                                        </div>
                                    </div>
                                </div>

                            <div class="form-group">
                                <div class="row">
                                    {{--<div class="col-md-3"><strong>Title : *</strong></div>--}}
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="title"
                                               value="{{$testimonial->post}}" placeholder="Name" required>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                    <div class="row">
                                        {{--<div class="col-md-3"><strong>Description : *</strong></div>--}}
                                        <div class="col-md-12">
                                    <textarea class="form-control ckeditor" name="description" rows="7"
                                              style="resize: none" maxlength="255" required>
                                        {{$testimonial->message}}
                                    </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div align="center">
                                                <a href="{{route('testimonials')}}" class="btn btn-success">
                                                    <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                                                </a>
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


