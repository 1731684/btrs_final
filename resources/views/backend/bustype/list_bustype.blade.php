@extends('layouts.backend')
@section('title', 'Bustype')
@section('activeBustype', 'active')
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
                Vehicle Dashboard
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">Vehicle Types</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Vehicles <strong></strong>&nbsp &nbsp </h3>

                            <a href="{{route('createBustype')}}" class="btn btn-default label-success">+ Add New</a>


                            <a href="{{route('viewBustype')}}" class="btn btn-info label-success pull-right"> <i
                                        class="glyphicon glyphicon-eye-open"></i> views all</a>
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
                                       class="table table-responsive editable_table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bustypes as $count => $key)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->bustypes_title}}</td>
                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <form action="{{route('showBustype')."/".$key->bustypes_id}}"
                                                                  method="get">
                                                                <button type="submit" class="btn btn-info btn-xs">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </form>
                                                        </th>
                                                        <th>
                                                            <form action="{{route('editBustype')."/".$key->bustypes_id}}"
                                                                  method="get">
                                                                <button type="submit" class="btn btn-success btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                            </form>
                                                        </th>
                                                        <th>
                                                            <form class="client" action="{{route('destroyBustype')}}"
                                                                  method="post" onsubmit=" return ConfirmDelete()">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="id"
                                                                       value="{{$key->bustypes_id}}">
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
                        <div class="col-md-12" align="center">{{ $bustypes->links() }}</div>
                    </div>
                </div>
            </div>
        </section>

    </div>

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