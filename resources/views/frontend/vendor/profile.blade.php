@include('branches.header')
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
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

    <div class = "container">
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
        <div class = "section-title" data-animation = "fadeInUp">
            <h2 class ="title">Your Profile</h2>
        </div>
        <div class = "row text-center">

            <div class="col-md-9">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 col-sm-3">Name</label>
                            <div class="col-md-9 col-sm-9">
                                <p class="form-control" style="text-transform: uppercase;">{{$vendor->name}}</p>
                            </div>
                            <!-- <div class="col-md-4 col-sm-4">
                                <p class="form-control" style="text-transform: uppercase;">LastName</p>
                            </div> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 col-sm-3">E-mail</label>
                            <div class="col-md-9 col-sm-9">
                                <p class="form-control">{{$vendor->email}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 col-sm-3">Address</label>
                            <div class="col-md-9 col-sm-9">
                                <p class="form-control">{{$vendor->address}}</p>
                            </div>
                            <!-- <div class="col-md-3 col-sm-3">
                                <p class="form-control">District</p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <p class="form-control">Zone</p>
                            </div> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 col-sm-3">Contact</label>
                            <div class="col-md-9 col-sm-9">
                                <p class="form-control">{{$vendor->contact}}</p>
                            </div>
                            <!--  <div class="col-md-4 col-sm-4">
                                <p class="form-control">Contact2</p>
                             </div> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">&nbsp;</div>
                            <div class="col-md-4 col-sm-4">
                                <a href="{{route('editProfileVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Edit</a>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <a href="#" class="btn btn-info form-control" style="color: white;background-color: #dd4a2a; ">Change Password</a>
                            </div>

                        </div>
                    </div>
                </div>

            <div class="col-md-3">
                <div class="col-md-12">
                    <img class="himg" src="{{ url('/img/vendor/'.$vendor->image) }}" width="280" height="150"/>
                </div>

            </div>

        </div>
    </div>

</section>
@include('branches.footer')

