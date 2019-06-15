@include('branches.header')
<link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap-responsive.min.css') }}" />
<!-- himg CSS -->
<link rel="stylesheet" href="{{ url('/css/animation.css') }}" />
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>


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
                <a href="{{route('vehiclesVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Vehicles</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('schedulesVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Schedules</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('bookingsVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Bookings</a>
            </div>
        </div>
    </div>
    <div class = "container">
        <div class = "section-title" data-animation = "fadeInUp">
            <h2 class ="title">Register Vehicle</h2>
        </div>
        <div class = "row text-center">

            <div class="col-md-9">
                <div class=" panel-body ">

                    <form action="{{route('storeVehiclesVendor')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="rows">
                            <div class="col-md-12">
                                <div class="col-md-3"><strong>Name : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title" placeholder="Name" required>
                                    <small class="text text-danger">{{$errors->first('title')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Bus Number : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="vehicle_no" placeholder="Bus No" required>
                                    <small class="text text-danger">{{$errors->first('vehicle_no')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;&nbsp;</div>
                                <div class="col-md-3"><strong>Bill Book No : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="address" placeholder="Bill Book No">
                                    <small class="text text-danger">{{$errors->first('billbook_no')}}</small>

                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Bus Type</strong></div>
                                <div class="col-md-9">
                                    <select name="bustypes_id" id="" class="form-control">
                                        @foreach($bustypes as $key)
                                            <option value="{{$key->bustypes_id}}">{{$key->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Route </strong></div>
                                <div class="col-md-9">
                                    <select name="routes_id" id="" class="form-control">
                                        @foreach($routes as $key)
                                            <option value="{{$key->routes_id}}">{{$key->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Driver1 : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="driver1" placeholder="Driver1">
                                    <small class="text text-danger">{{$errors->first('driver1')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Contact No : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="contact1" placeholder="Driver1 Contact">
                                    <small class="text text-danger">{{$errors->first('contact1')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Driver2 : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="driver2" placeholder="Driver2">
                                    <small class="text text-danger">{{$errors->first('driver2')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Contact No : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="contact2" placeholder="Driver2 Contact">
                                    <small class="text text-danger">{{$errors->first('contact2')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Staff1 : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="staff1" placeholder="Staff1">
                                    <small class="text text-danger">{{$errors->first('staff1')}}</small>
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-3"><strong>Contact No : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="contact3" placeholder="Staff1 Contact">
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
                                    <input type="text" class="form-control" name="contact4" placeholder="Staff2 Contact">
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
                    </form>
                    </div>
            </div>

            <div class="col-md-3">
                <div class="control-group">
                    <div class="controls">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 280px; height:240px;">
                                <img src="{{ url('/img/bus/avatar.jpg') }}"/>
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail"
                                 style="width: 280px; height:240px;"></div>
                            <div>
												<span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
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

</section>
<script type="text/javascript" src="{{ url('/jasny/jasny-bootstrap.min.js') }}"></script>
@include('branches.footer')

