@extends('layouts.backend')

@section('title', 'Bus')
@section('activeBus', 'active')

@section('content')
   

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
                                        <th>Bus No</th>
                                        <th>Billbook No</th>
                                        <th>Bus Type</th>
                                       <!--  <th>Route</th> -->
                                        <th>Vendor</th>
                                        <th>Driver1</th>
                                        <th>Contact No</th>
                                        <th>Driver2</th>
                                        <th>Contact No</th>
                                        <th>Staff1</th>
                                        <th>Contact No</th>
                                        <th>Staff2</th>
                                        <th>Contact No</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bus as $count =>$key)
                                        
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->buses_title}}</td>
                                            <td>{{$key->vehicle_no}}</td>
                                            <td>{{$key->billbook_no}}</td>
                                            <td>{{$key->bustypes->bustypes_title}}</td>
                                           
                                            <td>{{$key->vendors->email}}</td>
                                            <td>{{$key->driver1}}</td>
                                            <td>{{$key->contact1}}</td>
                                            <td>{{$key->driver2}}</td>
                                            <td>{{$key->contact2}}</td>
                                            <td>{{$key->staff1}}</td>
                                            <td>{{$key->contact3}}</td>
                                            <td>{{$key->staff2}}</td>
                                            <td>{{$key->contact4}}</td>
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