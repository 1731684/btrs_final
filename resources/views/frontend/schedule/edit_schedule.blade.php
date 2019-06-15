@include('branches.header')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your
                Schedules</a>
        </div>
        <div class="col-md-4 col-sm-4">
            <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your
                Vehicles</a>
        </div>
        <div class="col-md-4 col-sm-4">
            <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your
                Bookings</a>
        </div>
    </div>
<div class="section-title" data-animation="fadeInUp">
    <h2 class="title">Edit Schedule</h2>
</div>
<div class="row">
    <form action="{{route('updateSchedulesVendor')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{$schedule->schedules_id}}">
        {{csrf_field()}}
        <div class="rows">
            <div class="col-md-3"><strong>Bus: *</strong></div>
            <div class="col-md-9">
                <select name="buses_id"  class="form-control">
                    @foreach($buses as $key)
                        <option value="{{$key->buses_id}}"
                                @if($key->buses_id==$schedule->buses_id) selected @endif>{{$key->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="rows ">
            <div class="col-md-3"><strong>Departure Date/Time: *</strong></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="departure_date"
                               value="{{$schedule->departure_date}}">
                        <small class="text text-danger">{{$errors->first('departure_date')}}</small>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="departure_time"
                               value="{{$schedule->departure_time}}">
                        <small class="text text-danger">{{$errors->first('departure_time')}}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="rows ">
            <div class="col-md-3"><strong>Arrival Date/Time: *</strong></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="arrival_date" class="form-control"
                               value="{{$schedule->arrival_date}}">
                        <small class="text text-danger">{{$errors->first('arrival_date')}}</small>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="arrival_time" class="form-control"
                               value="{{$schedule->arrival_time}}">
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
                    <option value="day" class="form-control" @if($schedule->shift=='day')selected @endif>
                        Day
                    </option>
                    <option value="night" class="form-control"
                            @if($schedule->shift=='night')selected @endif>Night
                    </option>
                    <option value="none" class="form-control" @if($schedule->shift=='none')selected @endif>
                        None
                    </option>
                </select>
                <small class="text text-danger">{{$errors->first('shift')}}</small>
            </div>
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="rows ">
            <div class="col-md-3"><strong>Ticket Price : *</strong></div>
            <div class="col-md-9">
                <input type="text" name="ticket_price" class="form-control" value="{{$schedule->ticket_price}}">
                <small class="text text-danger">{{$errors->first('shift')}}</small>
            </div>
        </div>

        <div class="col-md-12">&nbsp;</div>
        <div class="row">&nbsp;
            <div class="col-md-12">
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

<script type="text/javascript" src="{{ url('/jasny/jasny-bootstrap.min.js') }}"></script>
@include('branches.footer')

