@extends('layouts.backend')

@section('title', 'View Schedules')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Schedule
            </h1>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-10">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">View <strong style="color: #5fa7da">Schedule</strong>&nbsp &nbsp</h3>
                        </div>

                        <div class="box-body">
                            <form action="{{route('updateSchedule')}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{$schedule->schedules_id}}" disabled>

                                {{csrf_field()}}


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Bus: *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="{{$schedule->buses->title}}" disabled>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Departure Date/Time: *</strong></div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="departure_date"
                                                           value="{{$schedule->departure_date}}" disabled="">
                                                    <small class="text text-danger">{{$errors->first('departure_date')}}</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="departure_time"
                                                           value="{{$schedule->departure_time}}" disabled="">
                                                    <small class="text text-danger">{{$errors->first('departure_time')}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Arrival Date/Time: *</strong></div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="arrival_date" class="form-control"
                                                           value="{{$schedule->arrival_date}}" disabled="">
                                                    <small class="text text-danger">{{$errors->first('arrival_date')}}</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="arrival_time" class="form-control"
                                                           value="{{$schedule->arrival_time}}" disabled="">
                                                    <small class="text text-danger">{{$errors->first('arrival_time')}}</small>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><strong>Routes : *</strong></div>
                            <div class="col-md-9">
                                <select name="routes_id" class="form-control" disabled="">
                                 @foreach($routes as $key)
                                        <option value="{{$key->routes_id}}"
                                            @if($key->routes_id==$schedule->routes_id) selected @endif>{{$key->title}}</option>
                                    @endforeach
                            </select>
                                <small class="text text-danger">{{$errors->first('routes_id')}}</small>
                            </div>
                        </div>
                    </div>



                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Shift : *</strong></div>
                                        <div class="col-md-9">
                                            <select name="shift" id="shift" class="form-control" disabled="">
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
                                </div>



                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Ticket Price : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" name="ticket_price" class="form-control" value="{{$schedule->ticket_price}}">
                                            <small class="text text-danger">{{$errors->first('shift')}}</small>
                                        </div>
                                    </div>
                                </div>
 -->
                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Boarding Point : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" name="boarding[]" class="form-control" value="{{$schedule->boarding}}" disabled="">
                                            <small class="text text-danger">{{$errors->first('boarding')}}</small>
                                        </div>
                                    </div>
                                </div>


                               <!--  <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
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
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection