@extends('layouts.backend')

@section('title', 'Edit Schedules')

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
                            <h3 class="box-title">Edit <strong style="color: #5fa7da">Schedule</strong>&nbsp &nbsp</h3>
                        </div>

                        <div class="box-body">
                            <form action="{{route('updateSchedule')}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{$schedule->schedules_id}}">

                                {{csrf_field()}}


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Bus: *</strong></div>
                                        <div class="col-md-9">
                                            <select name="buses_id" id="" class="form-control">
                                                @foreach($buses as $key)
                                                    <option value="{{$key->buses_id}}"
                                                            @if($key->buses_id==$schedule->buses_id) selected @endif>{{$key->buses_title}}</option>
                                                @endforeach
                                            </select>
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
                                </div>


                                <div class="form-group">
                                    <div class="row">
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
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Shift : *</strong></div>
                                        <div class="col-md-9">
                                            <select name="shift" id="shift" class="form-control">
                                                <option value="day" class="form-control"
                                                        @if($schedule->shift=='day')selected @endif>
                                                    Day
                                                </option>
                                                <option value="night" class="form-control"
                                                        @if($schedule->shift=='night')selected @endif>Night
                                                </option>
                                                <option value="none" class="form-control"
                                                        @if($schedule->shift=='none')selected @endif>
                                                    None
                                                </option>
                                            </select>
                                            <small class="text text-danger">{{$errors->first('shift')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Routes : *</strong></div>
                                        <div class="col-md-9">
                                            <select name="routes_id" class="form-control" id="routesValue">
                                                @foreach($routes as $key)
                                                    <option value="{{$key->routes_id}}"
                                                            @if($key->routes_id==$schedule->routes_id) selected @endif>{{$key->routes_title}}</option>
                                                @endforeach
                                            </select>
                                            <small class="text text-danger">{{$errors->first('routes_id')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Boarding Point : *</strong></div>
                                        <div class="col-md-9" id="boarding_points">
                                            <?php
                                            $items = explode(',', $schedule->boarding_points);
                                            foreach($items as $key => $value){
                                            ?>
                                             <strong>{{$value}}&ensp;</strong>
                                            <?php
                                            }
                                            ?>
                                            <a href="#" id="showbutton"> <i class="fa fa-check"></i>&nbsp;
                                                Action
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">&ensp;</div>

                                <!-- start of dropping point -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Dropping Point : *</strong></div>
                                        <div class="col-md-9" id="dropping_points">
                                            <?php
                                            $items = explode(',', $schedule->dropping_points);
                                            foreach($items as $key => $value)
                                            {
                                            ?>
                                                <strong>{{$value}}&ensp;</strong>
                                            <?php
                                            }
                                            ?>
                                            <a href="#" id="showdroppingbutton"> <i class="fa fa-check"></i>&nbsp;
                                                Action
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of dropping point -->

                                {{--<div class="form-group">    --}}
                                {{--<div class="row">--}}
                                {{--<div class="col-md-3"><strong>Boarding Point : *</strong></div>--}}

                                {{--<div class="col-md-9">--}}
                                {{--<a href="#" id="showbutton" onclick="show()" class="btn btn-primary col-md-3"><i class="fa fa-check"></i>&nbsp Select Here</a>--}}
                                {{----}}
                                {{--<a href="#" id="hidebutton" onclick="hide()" class="btn btn-danger col-md-3"><i class="fa fa-close"></i>&nbsp Close</a>--}}
                                {{----}}
                                {{--<div id="hide">--}}
                                {{--@foreach($routes as $key)--}}
                                {{--<input type="checkbox" name="boarding[]" class="{{$key->routes_id}}" value="{{$key->city_cover}}" @if($key->routes_id==$schedule->boarding) checked @endif>--}}
                                {{--<label for="{{$key->routes_id}}">{{$key->city_cover}}</label>--}}
                                {{--@endforeach--}}
                                {{--</div>  --}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">    --}}
                                {{--<div class="row">--}}
                                {{--<div class="col-md-3"><strong>Dropping Point : *</strong></div>--}}
                                {{--<div class="col-md-9">--}}
                                {{--<a href="#" id="showdroppingbutton" onclick="showdropping()" class="btn btn-primary col-md-3"><i class="fa fa-check"></i>&nbsp Select Here</a>--}}
                                {{--<a href="#" id="hidedroppingbutton" onclick="hidedropping()" class="btn btn-danger col-md-3"><i class="fa fa-close"></i>&nbsp Close</a>--}}
                                {{----}}
                                {{--<div id="hidedropping">--}}
                                {{--<input type="checkbox" name="dropping[]" id="ktm" value="ktm">--}}
                                {{--<label for="ktm">Kathmandu</label>--}}
                                {{--&nbsp--}}
                                {{--<input type="checkbox" name="dropping[]" id="brt" value="brt">--}}
                                {{--<label for="brt">Biratnagar</label>--}}
                                {{--&nbsp--}}

                                {{--<input type="checkbox" name="dropping[]" id="jhapa" value="jhapa">--}}
                                {{--<label for="jhapa">Jhapa</label>--}}
                                {{--&nbsp--}}
                                {{--<input type="checkbox" name="dropping[]" id="palpa" value="palpa">--}}
                                {{--<label for="palpa">Palpa</label>--}}
                                {{--&nbsp--}}
                                {{--<input type="checkbox" name="dropping[]" id="pokhara" value="pokhara">--}}
                                {{--<label for="pokhara">Pokhara</label>--}}
                                {{--&nbsp--}}
                                {{--<input type="checkbox" name="dropping[]" id="narayanghat" value="narayanghat">--}}
                                {{--<label for="narayanghat">Narayanghat</label>--}}
                                {{--&nbsp--}}
                                {{--<input type="checkbox" name="dropping[]" id="butwal" value="butwal">--}}
                                {{--<label for="butwal">Butwal</label>--}}

                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}


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

    <script>

        $(document).ready(function () {
            var value = $('#routesValue').val();
            $('#showbutton').click(function () {
                $.ajax({
                    type: "POST",
                    data: {"id": value},
                    url: "ajax/fetch",
                    beforeSend: function () {
                        $('#showbutton').html('loading please wait...');
                        $('#showdroppingbutton').html('loading please wait...');
                    },
                    success: function (response) {
                        var string = '';
                        var dropping = '';
                        var r = jQuery.parseJSON(response);
                        var i;
                        for (i = 0; i < r.length; ++i) {
                            string += ' <input type="checkbox" name="boarding_points[]" id = "' + r[i] + '"  value="' + r[i] + '"><label for="' + r[i] + '">' + r[i] + '</label>&ensp;<input type="checkbox" name="boarding_points[]" id = "\' + r[i] + \'"  value="\' + r[i] + \'"><label for="\' + r[i] + \'">\' + r[i] + \'</label>&ensp;';
                            // console.log(string);
                        }
                        for (i = 0; i < r.length; ++i) {
                            dropping += ' <input type="checkbox" name="dropping_points[]" id = "' + r[i] + 1 + '"  value="' + r[i] + '"><label for="' + r[i] + 1 + '">' + r[i] + '</label>&ensp;';
                            // console.log(string);
                        }
                        $('#boarding_points').prepend(string);
                        $('#dropping_points').prepend(string);
                        $('#showbutton').html('');
                        $('#showdroppingbutton').html('');

                    }
                });

            });
        });


    </script>

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
    {{--<script type="text/javascript">--}}

    {{--function show()--}}
    {{--{ --}}
    {{--document.getElementById("hidebutton").style.display = "block";--}}
    {{--document.getElementById("hide").style.display = "block";--}}
    {{--document.getElementById("showbutton").style.display = "none"; --}}
    {{--}--}}

    {{--function hide()--}}
    {{--{ --}}
    {{--document.getElementById("hidebutton").style.display = "none";--}}
    {{--document.getElementById("hide").style.display = "none";--}}
    {{--document.getElementById("showbutton").style.display = "block";--}}
    {{--}--}}

    {{--function showdropping()--}}
    {{--{ --}}
    {{--document.getElementById("hidedroppingbutton").style.display = "block";--}}
    {{--document.getElementById("hidedropping").style.display = "block";--}}
    {{--document.getElementById("showdroppingbutton").style.display = "none"; --}}
    {{--}--}}

    {{--function hidedropping()--}}
    {{--{ --}}
    {{--document.getElementById("hidedroppingbutton").style.display = "none";--}}
    {{--document.getElementById("hidedropping").style.display = "none";--}}
    {{--document.getElementById("showdroppingbutton").style.display = "block";--}}
    {{----}}
    {{--}--}}
    {{--</script>--}}
@endsection