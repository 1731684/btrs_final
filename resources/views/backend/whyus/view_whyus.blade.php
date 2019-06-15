@extends('layouts.backend')

@section('title', 'View Why Choose Us')

@section('content')
    {{--<div class="col-lg-9 main-chart">--}}
        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading" align="center">--}}
                {{--<h3 class="panel-title">View Why Choose Us</h3>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--<div class="rows">--}}
                    {{--<div class="col-md-3">--}}
                        {{--<img class="himg" src="{{ url('/img/whyus/'.$whyus->image) }}" width="160px"/>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-9">--}}
                        {{--<div class="col-md-3"><strong>Title : *</strong></div>--}}
                        {{--<div class="col-md-9">--}}
                            {{--<input type="text" class="form-control" name="title" value="{{$whyus->title}}" disabled>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12">&nbsp;</div>--}}
                        {{--<div class="col-md-3"><strong>Description : *</strong></div>--}}
                        {{--<div class="col-md-9">--}}
                                {{--<textarea class="form-control" name="description" rows="7" style="resize: none;"--}}
                                          {{--disabled>--}}
                                    {{--{{$whyus->description}}--}}
                                {{--</textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12">&nbsp;</div>--}}
                    {{--<div align="center">--}}
                        {{--<a href="{{route('whyus')}}" class="btn btn-success">--}}
                            {{--<i class="fa fa-check"></i>&nbsp;&nbsp;Procced--}}
                        {{--</a>--}}
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
                <li class="breadcrumb-item active">WhyUs</li>
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
                                        <th>Description</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($whyus as $count =>$key)

                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->title}}</td>
                                            <td>{{$key->description}}</td>

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