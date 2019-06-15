@extends('layouts.backend')
@section('title', 'User')
@section('activeSchedule', 'active')
@section('content')

    <script>
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);
    </script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Schedule Dashboard
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Booking</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Schedule <strong>Datatable</strong>&nbsp &nbsp                            </h3>

                            <a href="{{route('createSchedule')}}" class="btn btn-default label-success">+ Add New</a>



                            <a href="{{route('viewSchedule')}}" class="btn btn-info label-success pull-right" > <i class="glyphicon glyphicon-eye-open"></i> views all</a>
                        </div>

                        <div class="box-body">
                            <div class="panel-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success" role="alert" align="center">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>{{session()->get('success')}}</strong>
                                    </div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-danger" role="alert" align="center">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>{{session()->get('error')}}</strong>
                                    </div>
                                @endif
                                <table id="example1"
                                       class="table   table-responsive editable_table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Bus</th>
                                        <th>Routes</th>
                                        <th>Departure Date</th>
                                        <th>Departure Time</th>
                                        <th>Price</th>
                                        <th>Shift</th>

                                        <!-- <th>Boarding Point</th> -->
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($schedules as $count => $key)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->buses->buses_title}}</td>
                                            <td>{{$key->routes->routes_title }}</td>
                                            <td>{{$key->departure_date}}</td>
                                            <td>{{$key->departure_time}}</td>
                                            <td><a href="{{route('createSchedulePrice').'/'.$key->schedules_id}}">Create</a>|<a href="{{route('showSchedulePrice').'/'.$key->schedules_id}}">Show</a></td>
                                            <td>{{$key->shift}}  </td>

                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>
                                                        <form action="{{route('showSchedule')."/".$key->schedules_id}}"
                                                        method="get">
                                                        <button type="submit" class="btn btn-info btn-xs">
                                                        <i class="fa fa-eye"></i>
                                                        </button>
                                                        </form>
                                                        </th>
                                                        <th>
                                                            <form action="{{route('editSchedule')."/".$key->schedules_id}}"
                                                                  method="get">
                                                                <button type="submit" class="btn btn-success btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                            </form>
                                                        </th>
                                                        
                                                        <th>
                                                            <form class="client" action="{{route('destroySchedule')}}"
                                                                  method="post"
                                                                  onsubmit=" return ConfirmDelete()">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="id"
                                                                       value="{{$key->schedules_id}}">
                                                                <button type="submit" class="btn btn-danger btn-xs">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12" align="center">{{ $schedules->links() }}</div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    {{--<!-- jQuery 3 -->--}}
    {{--<script src="{{ url('/backend/assets/vendor_components/jquery/dist/jquery.min.js')}}"></script>--}}

    {{--<!-- popper -->--}}
    {{--<script src="{{ url('/backend/assets/vendor_components/popper/dist/popper.min.js')}}"></script>--}}

    {{--<!-- Bootstrap 4.0-->--}}
    {{--<script src="{{ url('/backend/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>--}}

    {{--<!-- SlimScroll -->--}}
    {{--<script src="{{ url('/backend/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>--}}

    {{--<!-- FastClick -->--}}
    {{--<script src="{{ url('/backend/assets/vendor_components/fastclick/lib/fastclick.js')}}"></script>--}}

    {{--<!-- DataTables -->--}}
    {{--<script src="{{ url('/backend/assets/vendor_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script src="{{ url('/backend/assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>--}}

    {{--<!-- This is data table -->--}}
    {{--<script src="{{ url('/backend/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js')}}"></script>--}}

    {{--<!-- Editable -->--}}
    {{--<script src="{{ url('/backend/assets/vendor_components/tiny-editable/mindmup-editabletable.js')}}"></script>--}}
    {{--<script src="{{ url('/backend/assets/vendor_components/tiny-editable/numeric-input-example.js')}}"></script>--}}
    {{--<script>--}}
    {{--$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();--}}
    {{--$('#example1').editableTableWidget().numericInputExample().find('td:first').focus();--}}
    {{--</script>--}}

    {{--<!-- Lion_admin App -->--}}
    {{--<script src="{{ url('/backend/js/template.js')}}"></script>--}}

    {{--<!-- Lion_admin for demo purposes -->--}}
    {{--<script src="{{ url('/backend/js/demo.js')}}"></script>--}}

    {{--<!-- Lion_admin for Data Table -->--}}
    {{--<script src="{{ url('/backend/js/pages/data-table.js')}}"></script>--}}

    <script>
        function ConfirmDelete() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>

@endsection