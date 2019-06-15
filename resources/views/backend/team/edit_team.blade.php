@extends('layouts.backend')

@section('title', 'Edit Team')

@section('content')
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Team
      </h1>
      
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit <strong style="color: #5fa7da">Team</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">
                <form action="{{route('updateTeam')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$team->teams_id}}">


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 160px; height:110px;">
                                                <img src="{{ url('/img/team/'.$team->image) }}"/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="width: 160px; height:110px;"></div>
                                            <div>
    												<span class="btn btn-file">
    												<span class="fileupload-new btn btn-primary">Select image</span>
    												<span class="fileupload-exists btn btn-info">Change</span>
                                                        <input type="file" name="image" value="{{$team->image}}"/>
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
                            <div class="col-md-3"><strong>Title :</strong></div>
                                <div class="col-md-9">
                                    <select class="form-control" name="title">
                                        <option value="Mr." @if($team->title=='Mr.')selected @endif>Mr.</option>
                                        <option value="Mrs." @if($team->title=='Mrs.')selected @endif>Mrs.</option>
                                        <option value="Er." @if($team->title=='Er.')selected @endif>Er.</option>
                                    </select>
                                </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><strong>Name : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" value="{{$team->name}}"
                                       placeholder="your name" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><strong>Post : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="post" value="{{$team->post}}"
                                       placeholder="your post" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><strong>Facebook Link :</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="facebook" value="{{$team->facebook}}"
                                       placeholder="facebook link">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><strong>Twitter Link :</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="twitter" value="{{$team->twitter}}"
                                       placeholder="twitter link">
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="row">
                            <div class="col-12">
                                <div align="center">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                        Save Changes
                                    </button>&nbsp;&nbsp;
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