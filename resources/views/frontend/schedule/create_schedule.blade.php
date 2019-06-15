@include('branches.header')
<section id = "about-us" class = " page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a href="{{route('schedulesVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Schedules</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('vehiclesVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Vehicles</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('bookingsVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Bookings</a>
            </div>
        </div>
    </div>
    <div class = "container">
        <div class = "section-title" data-animation = "fadeInUp">
            <h2 class ="title">Create Schedule</h2>
        </div>
        <div class = "row text-center">
            <div class="col-md-9">
                <div class=" panel-body ">
                    <form action="{{route('storeSchedulesVendor')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="rows">
                            <div class="col-md-3"><strong>Bus : *</strong></div>
                            <div class="col-md-9">
                                <select name="buses_id" id="" class="form-control">
                                    @foreach($buses as $key)
                                        <option value="{{$key->buses_id}}">{{$key->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">&nbsp;</div>
                        <div class="rows ">
                            <div class="col-md-3"><strong>Departure Date: *</strong></div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="departure_date"
                                               placeholder=" Departure Date (yy/mm/dd) " required>
                                        <small class="text text-danger">{{$errors->first('departure_date')}}</small>

                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="departure_time"
                                               placeholder="00:00 am" required>
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
                                               placeholder="Arrival Date (yy/mm/dd)" required>
                                        <small class="text text-danger">{{$errors->first('arrival_date')}}</small>

                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="arrival_time" class="form-control"
                                               placeholder="00:00 am" required>
                                        <small class="text text-danger">{{$errors->first('arrival_time')}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="rows ">
                            <div class="col-md-3"><strong>Shift : *</strong></div>
                            <div class="col-md-9">
                                <select name="shift" id="shift" class="form-control">
                                    <option value="day" class="form-control">Day</option>
                                    <option value="night" class="form-control">Night</option>
                                    <option value="none" class="form-control" selected>None</option>
                                </select>
                                <small class="text text-danger">{{$errors->first('shift')}}</small>
                            </div>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="rows ">
                            <div class="col-md-3"><strong>Ticket Price : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" name="ticket_price" class="form-control" required>
                                <small class="text text-danger">{{$errors->first('shift')}}</small>
                            </div>
                        </div>

                        <div class="col-md-12">&nbsp;</div>

                        <div class="row">&nbsp;
                            <div class="col-md-9 col-md-offset-3">
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
                    </form>
                    </div>
            </div>
        </div>
    </div>
</section>

@include('branches.footer')

