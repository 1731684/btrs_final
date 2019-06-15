@extends('layouts.backend')

@section('title', 'Edit Who We Are')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Who We Are
      </h1>
      
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit <strong style="color: #5fa7da">Who We Are</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">
                <form action="{{route('updateWhoweare')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$whoweare->whoweare_id}}">

                    <div class="row" align="center">
                        <div class="col-md-12" align="center">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 160px; height:110px;">
                                            <img src="{{url('/img/whoweare/'.$whoweare->image) }}" />
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="width: 160px; height:110px;"></div>
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
                                    <input type="text" class="form-control" name="title" value="{{$whoweare->title}}" placeholder="Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                {{--<div class="col-md-3"><strong>Description : *</strong></div>--}}
                                <div class="col-md-12">
                                    <textarea class="form-control ckeditor" name="description" rows="7" style="resize: none" maxlength="255" required>
                                        {{$whoweare->description}}
                                    </textarea>
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
                </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>
@endsection