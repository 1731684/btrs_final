@extends('layouts.backend')

@section('title', 'Create Schedule')

@section('content')
    <link href="{{ url('public/frontend/css/bootstrap-datepicker.css') }}" rel="stylesheet">
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
                <div class="col-12 col-lg-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Create <strong style="color: #5fa7da">Schedule</strong>&nbsp &nbsp
                            </h3>
                        </div>

                        <div class="box-body">

                            <form action="{{route('storeSchedule')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Bus : *</strong></div>
                                        <div class="col-md-9">
                                            <select name="buses_id" id="" class="form-control">
                                                @foreach($buses as $key)
                                                    <option value="{{$key->buses_id}}">{{$key->buses_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Route : *</strong></div>
                                        <div class="col-md-9">
                                            <select name="routes_id" class="form-control">
                                                @foreach($routes as $key)
                                                    <option value="{{$key->routes_id}}">{{$key->routes_title}}</option>
                                                @endforeach
                                            </select>
                                            <small class="text text-danger">{{$errors->first('routes_id')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Departure Date: *</strong></div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control datepicker"  name="departure_date"
                                                           placeholder=" Departure Date (dd-mm-yy) " id="date" autocomplete="off"
                                                           required>
                                                    <small class="text text-danger">{{$errors->first('departure_date')}}</small>

                                                </div>

                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="departure_time"
                                                           placeholder="00:00 am" autocomplete="off" required>
                                                    <small class="text text-danger">{{$errors->first('departure_time')}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Arrival Date : *</strong></div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="arrival_date" class="form-control"
                                                           placeholder="Arrival Date (dd-mm-yy)" id="date" autocomplete="off" required>
                                                    <small class="text text-danger">{{$errors->first('arrival_date')}}</small>

                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="arrival_time" class="form-control"
                                                           placeholder="00:00 am" autocomplete="off" required>
                                                    <small class="text text-danger">{{$errors->first('arrival_time')}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
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
                                </div>


                                <!-- start of boarding point -->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Boarding Point : *</strong></div>
                                        <div class="col-md-9">

                                            <a href="#" id="showbutton" onclick="show()"> <i class="fa fa-check"></i>&nbsp
                                                Select
                                                Here</a>
                                            <a href="#" id="hidebutton" onclick="hide()"><i class="fa fa-close"></i>&nbsp
                                                Close</a>

                                            <div id="hide">
                                                @foreach($destinations as $key)
                                                    <input type="checkbox" name="boarding_points[]"
                                                           id="{{$key->cities_title}}"
                                                           value="{{$key->cities_title}}">
                                                    <label for="{{$key->cities_title}}">{{$key->cities_title}}</label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- start of dropping point -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Dropping Point : *</strong></div>
                                        <div class="col-md-9">
                                            <a href="#" id="showdroppingbutton" onclick="showdropping()"
                                            ><i class="fa fa-check"></i>&nbsp Select
                                                Here</a>
                                            <a href="#" id="hidedroppingbutton" onclick="hidedropping()"
                                            <i class="fa fa-close"></i>&nbsp
                                            Close</a>

                                            <div id="hidedropping">
                                                @foreach($destinations as $key)
                                                    <input type="checkbox" name="dropping_points[]"
                                                           id="{{$key->cities_title}}Z"
                                                           value="{{$key->cities_title}}">
                                                    <label for="{{$key->cities_title}}Z">{{$key->cities_title}}</label>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of dropping point -->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div align="center">
                                                <button type="submit" class="btn btn-success"><i
                                                            class="fa fa-check"></i>&nbsp;&nbsp;
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

    <style type="text/css">
        #hide {
            display: none;
        }

        #hidebutton {
            display: none;
        }

        #hidedropping {
            display: none;
        }

        #hidedroppingbutton {
            display: none;
        }
    </style>
    <script>

        $(document).ready(function () {
            $('#showbutton').click(function () {
                $.ajax({
                    type: "GET",
                    dataType: "html",
                    url: "admin/schedules/ajax/fetch",
                    beforeSend: function () {
                        $('#showbutton').html('loading please wait...');
                    },
                    success: function (htmldata) {
                        console.log(htmldata);
                    }
                });
            });
        });

        function show() {
            document.getElementById("hidebutton").style.display = "block";
            document.getElementById("hide").style.display = "block";
            document.getElementById("showbutton").style.display = "none";
        }

        function hide() {
            document.getElementById("hidebutton").style.display = "none";
            document.getElementById("hide").style.display = "none";
            document.getElementById("showbutton").style.display = "block";
        }

        function showdropping() {
            document.getElementById("hidedroppingbutton").style.display = "block";
            document.getElementById("hidedropping").style.display = "block";
            document.getElementById("showdroppingbutton").style.display = "none";
        }

        function hidedropping() {
            document.getElementById("hidedroppingbutton").style.display = "none";
            document.getElementById("hidedropping").style.display = "none";
            document.getElementById("showdroppingbutton").style.display = "block";

        }
    </script>
    <script src="{{ url('public/frontend/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('public/frontend/js/custom.js') }}"></script>
@endsection