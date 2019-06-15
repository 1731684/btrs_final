@extends('layouts.backend')

@section('title', 'View Schedule')

@section('content')
    {{--<div class="content-wrapper" style="min-height: 1668.5px;">--}}

    {{--<div class="col-lg-9 main-chart">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-heading" align="center">--}}
    {{--<h3 class="panel-title">View Schedule</h3>--}}
    {{--</div>--}}
    {{--<div class="panel-body">--}}
    {{--<div class="rows">--}}
    {{--<div class="col-md-3"><strong>Bus Name : *</strong></div>--}}
    {{--<div class="col-md-9">--}}
    {{--<input type="text" class="form-control" value="{{$schedule->buses->title}}" disabled>--}}
    {{--<small class="text text-danger">{{$errors->first('buses_id')}}</small>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-md-12">&nbsp;</div>--}}

    {{--<div class="rows ">--}}
    {{--<div class="col-md-3"><strong>Departure Date: *</strong></div>--}}
    {{--<div class="col-md-9">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6">--}}
    {{--<input type="date" class="form-control" value="{{$schedule->departure_date}}" disabled>--}}
    {{--<small class="text text-danger">{{$errors->first('departure_date')}}</small>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--<input type="time" class="form-control" value="{{$schedule->departure_time}}" disabled>--}}
    {{--<small class="text text-danger">{{$errors->first('departure_time')}}</small>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">&nbsp;</div>--}}
    {{--<div class="rows ">--}}
    {{--<div class="col-md-3"><strong>Arrival Date : *</strong></div>--}}
    {{--<div class="col-md-9">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6">--}}
    {{--<input type="date" name="arrival_date" class="form-control"--}}
    {{--value="{{$schedule->arrival_date}}" disabled>--}}
    {{--<small class="text text-danger">{{$errors->first('arrival_date')}}</small>--}}

    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--<input type="time" name="arrival_time" class="form-control"--}}
    {{--value="{{$schedule->arrival_time}}" disabled>--}}
    {{--<small class="text text-danger">{{$errors->first('arrival_time')}}</small>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--<div class="col-md-12">&nbsp;</div>--}}

    {{--<div class="rows ">--}}
    {{--<div class="col-md-3"><strong>Shift : *</strong></div>--}}
    {{--<div class="col-md-9">--}}
    {{--<input type="text" class="form-control" value="{{$schedule->shift}}" disabled>--}}
    {{--<small class="text text-danger">{{$errors->first('shift')}}</small>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">&nbsp;</div>--}}
    {{--<div class="rows ">--}}
    {{--<div class="col-md-3"><strong>Ticket Price : *</strong></div>--}}
    {{--<div class="col-md-9">--}}
    {{--<input type="text" name="ticket_price" class="form-control" value="{{$schedule->ticket_price}}" disabled>--}}
    {{--<small class="text text-danger">{{$errors->first('shift')}}</small>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-md-12">&nbsp;</div>--}}

    {{--<div class="row">&nbsp;--}}
    {{--<div class="col-md-3">&ensp;</div>--}}
    {{--<div class="col-md-9">--}}
    {{--<div align="center">--}}
    {{--<div align="center">--}}
    {{--<a href="{{route('schedules')}}" class="btn btn-success">--}}
    {{--<i class="fa fa-check"></i>&nbsp;&nbsp;Procced--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Tables
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Hover Export Data Table</h3>
                            <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Bus Name</th>
                                        <th>Depart Data</th>
                                        <th>Depart Time</th>
                                        <th>Arrival Date</th>
                                        <th>Arrival Time</th>
                                        <th>shift</th>
                                        <!-- <th>Price</th>
 -->                                        <th>Routes</th>
                                        
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($schedule as $count =>$key)
                                        <tr>
                                    
                                            <td>{{++$count}}</td>
                                            <td>{{$key->buses->buses_title}}</td>
                                            <td>{{$key->departure_date}}</td>
                                            <td>{{$key->departure_time}}</td>
                                            <td>{{$key->arrival_date}}</td>
                                            <td>{{$key->arrival_time}}</td>
                                            <td>{{$key->shift}}</td>
                                            <!-- <td>{{$key->ticket_price}}</td> -->
                                            <td>{{$key->routes['routes_title']}}</td>
                                            
                                            
                                        </tr>
                                    @endforeach


                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
