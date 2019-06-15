@extends('layouts.backend')

@section('title', 'Edit Blog')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog
      </h1>
      
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-10">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit <strong style="color: #5fa7da">Blog</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">
                <form action="{{route('updateBlog')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$blog->blogs_id}}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="control-group">
                                <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 160px; height:110px;">
                                            <img src="{{ url('/img/blog/'.$blog->image) }}"/>
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                             style="width: 160px; height:110px;"></div>
                                        <div>
												<span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image" value="{{$blog->image}}"/>
                                                </span>
                                            {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><strong>Title : *</strong></div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" value="{{$blog->title}}"
                                               placeholder="title" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><strong>Post By: *</strong></div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="posted_by" value="{{$blog->posted_by}}"
                                               placeholder="Postby" required>
                                    </div>
                                </div>
                            </div>        

                            
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><strong>Description : *</strong></div>
                                <div class="col-md-9">
                                        <textarea class="form-control " name="description" id="description" rows="10"
                                                  style="resize: none" required>
                                            {{$blog->description}}
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
                                            </button> &nbsp&nbsp
                                            <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                                Cancel &nbsp&nbsp
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
</div>
</section>
</div>
@endsection