@include('branches.header')

<!-- Jasny CSS -->
<link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap-responsive.min.css') }}" />
<!-- himg CSS -->
<link rel="stylesheet" href="{{ url('/css/animation.css') }}" />


        <div class="panel-body">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{session()->get('success')}}</strong>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{session()->get('error')}}</strong>
                </div>
            @endif
        </div>

<section id = "about-us" class = " page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Vehicles</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Schedules</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Bookings</a>
            </div>
        </div>
    </div>
    <div class = "container">
        <div class = "section-title" data-animation = "fadeInUp">
            <h2 class ="title">Edit Vehicle</h2>
        </div>
        <div class = "row text-center">
            <form action="{{route('updateVehiclesVendor')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$bus->buses_id}}">
            <div class="col-md-9">

                    <div class="rows">
                        <div class="col-md-12">
                            <div class="panel-body">
                                <div class="col-md-3"><strong>Name : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title" placeholder="Name" value="{{$bus->title}}" required>
                                    <small class="text text-danger">{{$errors->first('title')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Bus Number : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="vehicle_no" placeholder="Bus No" value="{{$bus->vehicle_no}}" required>
                                    <small class="text text-danger">{{$errors->first('vehicle_no')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;&nbsp;</div>
                                <div class="col-md-3"><strong>Bill Book No : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="billbook_no" value="{{$bus->billbook_no}}" placeholder="Bill Book No">
                                    <small class="text text-danger">{{$errors->first('billbook_no')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Bus Type</strong></div>
                                <div class="col-md-9">
                                    <select name="bustypes_id" id="" class="form-control">
                                        @foreach($bustypes as $key)
                                            <option value="{{$key->bustypes_id}}" @if($key->bustypes_id==$bus->bustypes_id) selected @endif>{{$key->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Route </strong></div>
                                <div class="col-md-9">
                                    <select name="routes_id" id="" class="form-control">
                                        @foreach($routes as $key)
                                            <option value="{{$key->routes_id}}" @if($key->routes_id==$bus->routes_id) selected @endif >{{$key->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Driver1 : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="driver1" placeholder="Driver1" value="{{$bus->driver1}}">
                                    <small class="text text-danger">{{$errors->first('driver1')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Contact No : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="contact1" placeholder="Driver1 Contact" value="{{$bus->contact1}}">
                                    <small class="text text-danger">{{$errors->first('contact1')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Driver2 : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="driver2" placeholder="Driver2" value="{{$bus->driver2}}">
                                    <small class="text text-danger">{{$errors->first('driver2')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Contact No : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="contact2" placeholder="Driver2 Contact" value="{{$bus->contact2}}">
                                    <small class="text text-danger">{{$errors->first('contact2')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Staff1 : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="staff1" placeholder="Staff1" value="{{$bus->staff1}}">
                                    <small class="text text-danger">{{$errors->first('staff1')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Contact No : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="contact3" placeholder="Staff1 Contact" value="{{$bus->contact3}}">
                                    <small class="text text-danger">{{$errors->first('contact3')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Staff2 : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="staff2" placeholder="Staff2">
                                    <small class="text text-danger">{{$errors->first('staff2')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Contact No : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="contact4" placeholder="Staff2 Contact" value="{{$bus->contact4}}">
                                    <small class="text text-danger">{{$errors->first('contact4')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3">&ensp;</div>
                                <div class="col-md-9">
                                    <div align="center">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                            Save Changes
                                        </button>
                                        <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="col-md-3">
                <div class="control-group">
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 280px; height:240px;">
                                <img src="{{ url('/img/bus/'.$bus->image) }}"/>
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail"
                                 style="width: 280px; height:240px;"></div>
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
            </form>
        </div>
    </div>

</section>
<script type="text/javascript" src="{{ url('/jasny/jasny-bootstrap.min.js') }}"></script>
@include('branches.footer')

