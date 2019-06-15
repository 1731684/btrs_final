@extends('layouts.backend')

@section('title', 'View Team')

@section('content')
    {{--<div class="col-lg-9 main-chart">--}}
        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading" align="center">--}}
                {{--<h3 class="panel-title">View Team</h3>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--<div class="rows">--}}
                    {{--<div class="col-md-3">--}}
                        {{--<img class="himg" src="{{ url('/img/team/'.$team->image) }}" width="160px"/>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-9">--}}
                        {{--<div class="col-md-3"><strong>Title :</strong></div>--}}
                        {{--<div class="col-md-9">--}}
                            {{--<input type="text" class="form-control" value="{{$team->title}}" disabled>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12">&nbsp;</div>--}}
                        {{--<div class="col-md-3"><strong>Name : *</strong></div>--}}
                        {{--<div class="col-md-9">--}}
                            {{--<input type="text" class="form-control" name="name" value="{{$team->name}}" disabled>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12">&nbsp;</div>--}}
                        {{--<div class="col-md-3"><strong>Post : *</strong></div>--}}
                        {{--<div class="col-md-9">--}}
                            {{--<input type="text" class="form-control" name="post" value="{{$team->post}}" disabled>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12">&nbsp;</div>--}}
                        {{--<div class="col-md-3"><strong>Facebook Link :</strong></div>--}}
                        {{--<div class="col-md-9">--}}
                            {{--<input type="text" class="form-control" name="facebook" value="{{$team->facebook}}"--}}
                                   {{--disabled>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12">&nbsp;</div>--}}
                        {{--<div class="col-md-3"><strong>Twitter Link :</strong></div>--}}
                        {{--<div class="col-md-9">--}}
                            {{--<input type="text" class="form-control" name="twitter" value="{{$team->twitter}}" disabled>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12">&nbsp;</div>--}}
                        {{--<div align="center">--}}
                            {{--<a href="{{route('teams')}}" class="btn btn-success">--}}
                                {{--<i class="fa fa-check"></i>&nbsp;&nbsp;Procced--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View WhyUs
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Teams</li>
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
                                        <th>title</th>
                                        <th>Name</th>
                                        <th>Post</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($team as $count =>$key)

                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->title}}</td>
                                            <td>{{$key->name}}</td>
                                            <td>{{$key->post}}</td>

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
@endsection