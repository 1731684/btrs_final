@extends('layouts.backend')

@section('title', 'Edit Routes')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Route
      </h1>
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit <strong style="color: #5fa7da">Route</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">
                <form action="{{route('updateRoute')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$route->routes_id}}">

                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><strong>Title : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="routes_title" value="{{$route->routes_title}}" placeholder="Title" >
                                <small class="text text-danger">{{$errors->first('routes_title')}}</small>
                            </div>
                        </div>
                    </div>

                    @foreach ($destination as $key=>$value)
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><strong>Location@php echo ++$key; @endphp : *</strong></div>
                                <div class="col-md-9">
                                    <select class="form-control" id="educationDate" name="destination[]">
                                        <option value="">Select City</option>
                                        @foreach($cities as $count => $data)
                                            <option value="{{$data->cities_title}}" @if($data->cities_title==$value) selected @endif>{{$data->cities_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endforeach




                        

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
                </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>
@endsection