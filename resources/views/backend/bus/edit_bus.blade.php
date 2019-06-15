@extends('layouts.backend')

@section('title', 'Edit Bus')

@section('content')
    <link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap-responsive.min.css') }}"/>
    <!-- himg CSS -->
    <link rel="stylesheet" href="{{ url('/css/animation.css') }}"/>


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Bus
            </h1>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-10">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Edit <strong style="color: #5fa7da">Bus</strong>&nbsp &nbsp</h3>
                        </div>

                        <div class="box-body">
                            <form action="{{route('updateBus')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$bus->buses_id}}">

                                {{--<div class="form-group">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-12" align="center">--}}
                                            {{--<div class="control-group">--}}
                                                {{--<div class="controls">--}}
                                                    {{--<div class="fileupload fileupload-new" data-provides="fileupload">--}}
                                                        {{--<div class="fileupload-new thumbnail"--}}
                                                             {{--style="width: 195px; height:100px;">--}}
                                                            {{--<img src="{{ url('/img/bus/'.$bus->image) }}" id="showimage"/>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="fileupload-preview fileupload-exists thumbnail"--}}
                                                             {{--style="width: 195px; height:100px;" id="showimage"></div>--}}
                                                        {{--<div>--}}
                                                            {{--<small class="text text-danger">{{$errors->first('image')}}</small>--}}

                                                            {{--<span class="btn btn-file">--}}
    												{{--<span class="fileupload-new btn btn-primary">Select image</span>--}}
    												{{--<span class="fileupload-exists btn btn-info">Change</span>--}}
                                                        {{--<input type="file" name="image" id="readimage"/>--}}
                                                    {{--</span>--}}
                                                            {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Profile</strong></div>
                                        <div class="col-md-9">
                                            <select name="profile" id="" class="form-control">
                                                    <option value="active"
                                                            @if($bus->profile=='active') selected @endif>Active</option>
                                                <option value="hold"
                                                            @if($bus->profile=='hold') selected @endif>Hold</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Name : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="buses_title"
                                                   placeholder="Name" value="{{$bus->buses_title}}" required>
                                            <small class="text text-danger">{{$errors->first('buses_title')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Bus Number : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="vehicle_no"
                                                   placeholder="Bus No" value="{{$bus->vehicle_no}}" required>
                                            <small class="text text-danger">{{$errors->first('vehicle_no')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Bill Book No : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="billbook_no"
                                                   value="{{$bus->billbook_no}}" placeholder="Bill Book No">
                                            <small class="text text-danger">{{$errors->first('billbook_no')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Bus Type</strong></div>
                                        <div class="col-md-9">
                                            <select name="bustypes_id" id="" class="form-control">
                                                @foreach($bustypes as $key)
                                                    <option value="{{$key->bustypes_id}}"
                                                            @if($key->bustypes_id==$bus->bustypes_id) selected @endif>{{$key->bustypes_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Vendor</strong></div>
                                        <div class="col-md-9">
                                            <select name="vendors_id" id="" class="form-control">
                                                @foreach($vendors as $key)
                                                    <option value="{{$key->vendors_id}}"
                                                            @if($key->vendors_id==$bus->vendors_id) selected @endif>{{$key->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Amenities : *</strong></div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="amenity" id="" cols="70" rows="4" style="resize: none;">{{$bus->amenity}}</textarea>
                                            <small class="text text-danger">{{$errors->first('amenity')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Short Intro : *</strong></div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="description" id="" cols="60" rows="4" style="resize: none">{{$bus->description }}</textarea>
                                            <small class="text text-danger">{{$errors->first('description')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Driver1 : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="driver1" placeholder="Driver1"
                                                   value="{{$bus->driver1}}">
                                            <small class="text text-danger">{{$errors->first('driver1')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Contact No : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="contact1"
                                                   placeholder="Driver1 Contact" value="{{$bus->contact1}}">
                                            <small class="text text-danger">{{$errors->first('contact1')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Driver2 : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="driver2" placeholder="Driver2"
                                                   value="{{$bus->driver2}}">
                                            <small class="text text-danger">{{$errors->first('driver2')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Contact No : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="contact2"
                                                   placeholder="Driver2 Contact" value="{{$bus->contact2}}">
                                            <small class="text text-danger">{{$errors->first('contact2')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Staff1 : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="staff1" placeholder="Staff1"
                                                   value="{{$bus->staff1}}">
                                            <small class="text text-danger">{{$errors->first('staff1')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Contact No : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="contact3"
                                                   placeholder="Staff1 Contact" value="{{$bus->contact3}}">
                                            <small class="text text-danger">{{$errors->first('contact3')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Staff2 : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="staff2" placeholder="Staff2">
                                            <small class="text text-danger">{{$errors->first('staff2')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Contact No : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="contact4"
                                                   placeholder="Staff2 Contact" value="{{$bus->contact4}}">
                                            <small class="text text-danger">{{$errors->first('contact4')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div align="center">
                                                <button type="submit" class="btn btn-success"><i
                                                            class="fa fa-check"></i>&nbsp;&nbsp;
                                                    Save Changes&nbsp;&nbsp;
                                                </button>
                                                &nbsp&nbsp
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
