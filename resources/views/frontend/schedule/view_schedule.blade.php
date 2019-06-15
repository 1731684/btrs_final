@include('branches.header')
<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>


<section id="about-us" class=" page-section">
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
    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">View Schedules</h2>
        </div>
        <div class="panel-body">
            <div class="rows">
                <div class="col-md-3"><strong>Bus Name : *</strong></div>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{$schedule->buses->title}}" disabled>
                    <small class="text text-danger">{{$errors->first('buses_id')}}</small>
                </div>
            </div>

            <div class="col-md-12">&nbsp;</div>

            <div class="rows ">
                <div class="col-md-3"><strong>Departure Date: *</strong></div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$schedule->departure_date}}" disabled>
                            <small class="text text-danger">{{$errors->first('departure_date')}}</small>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{$schedule->departure_time}}" disabled>
                            <small class="text text-danger">{{$errors->first('departure_time')}}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="rows ">
                <div class="col-md-3"><strong>Arrival Date : *</strong></div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="arrival_date" class="form-control"
                                   value="{{$schedule->arrival_date}}" disabled>
                            <small class="text text-danger">{{$errors->first('arrival_date')}}</small>

                        </div>
                        <div class="col-md-6">
                            <input type=text" name="arrival_time" class="form-control"
                                   value="{{$schedule->arrival_time}}" disabled>
                            <small class="text text-danger">{{$errors->first('arrival_time')}}</small>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">&nbsp;</div>

            <div class="rows ">
                <div class="col-md-3"><strong>Shift : *</strong></div>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{$schedule->shift}}" disabled>
                    <small class="text text-danger">{{$errors->first('shift')}}</small>
                </div>
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="rows ">
                <div class="col-md-3"><strong>Ticket Price : *</strong></div>
                <div class="col-md-9">
                    <input type="text" name="ticket_price" class="form-control" value="{{$schedule->ticket_price}}" disabled>
                    <small class="text text-danger">{{$errors->first('shift')}}</small>
                </div>
            </div>

            <div class="col-md-12">&nbsp;</div>

            <div class="row">&nbsp;
                <div class="col-md-12">
                    <div align="center">
                        <div align="center">
                            <a href="{{route('schedulesVendor')}}" class="btn btn-success">
                                <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

@include('branches.footer')

