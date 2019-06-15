@extends('layouts.backend')

@section('title', 'User')
@section('activeUser', 'active')

@section('content')

    {{--<script>--}}
        {{--window.setTimeout(function () {--}}
            {{--$(".alert").fadeTo(500, 0).slideUp(500, function () {--}}
                {{--$(this).remove();--}}
            {{--});--}}
        {{--}, 2000);--}}
    {{--</script>--}}

    {{--<div class="col-lg-9 main-chart">--}}
        {{--<div>--}}
            {{--<h4><b>User</b>&nbsp;&nbsp;&nbsp;<a href="{{route('createUser')}}" class="btn btn-default">+ Add New</a></h4>--}}
        {{--</div>--}}
        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading" align="center">--}}
            {{--<h3 class="panel-title"><b>Team</b></h3>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--@if(session()->has('success'))--}}
                    {{--<div class="alert alert-success" role="alert" align="center">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                            {{--<span aria-hidden="true">&times;</span>--}}
                        {{--</button>--}}
                        {{--<strong>{{session()->get('success')}}</strong>--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--@if(session()->has('error'))--}}
                    {{--<div class="alert alert-danger" role="alert" align="center">--}}
                        {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                            {{--<span aria-hidden="true">&times;</span>--}}
                        {{--</button>--}}
                        {{--<strong>{{session()->get('error')}}</strong>--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--<table class="table table-striped table-hover">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>S.No.</th>--}}
                        {{--<th>Name</th>--}}
                        {{--<th>Email</th>--}}
                        {{--<th>Username</th>--}}
                        {{--<th>User Type</th>--}}
                        {{--<th>Action</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@foreach($users as $count => $key)--}}
                        {{--<tr>--}}
                            {{--<td>{{++$count}}</td>--}}
                            {{--<td>{{$key->name}}</td>--}}
                            {{--<td>{{$key->email}}</td>--}}
                            {{--<td>{{$key->username}}</td>--}}
                            {{--<td>{{$key->user_type}}</td>--}}
                            {{--<td>--}}
                                {{--<table>--}}
                                    {{--<tr>--}}
                                        {{--<th>--}}
                                            {{--<form action="{{route('showUser')."/".$key->users_id}}" method="get">--}}
                                                {{--<button type="submit" class="btn btn-info btn-xs">--}}
                                                    {{--<i class="fa fa-eye"></i>--}}
                                                {{--</button>--}}
                                            {{--</form>--}}
                                        {{--</th>--}}
                                        {{--<th>&nbsp;</th>--}}
                                        {{--<th>--}}
                                            {{--<form action="{{route('editUser')."/".$key->users_id}}" method="get">--}}
                                                {{--<button type="submit" class="btn btn-success btn-xs">--}}
                                                    {{--<i class="fa fa-pencil"></i>--}}
                                                {{--</button>--}}
                                            {{--</form>--}}
                                        {{--</th>--}}
                                        {{--<th>&nbsp;&nbsp;</th>--}}
                                        {{--<th>--}}
                                            {{--<form class="client" action="{{route('destroyUser')}}" method="post" onsubmit=" return ConfirmDelete()">--}}
                                                {{--{{csrf_field()}}--}}
                                                {{--<input type="hidden" name="id" value="{{$key->users_id}}">--}}
                                                {{--<button type="submit" class="btn btn-danger btn-xs">--}}
                                                    {{--<i class="fa fa-trash-o"></i>--}}
                                                {{--</button>--}}
                                            {{--</form>--}}
                                        {{--</th>--}}
                                    {{--</tr>--}}
                                {{--</table>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-12" align="center">{{ $users->links() }}</div>--}}
    {{--</div>--}}

    {{--<script>--}}
        {{--function ConfirmDelete()--}}
        {{--{--}}
            {{--var x = confirm("Are you sure you want to delete?");--}}
            {{--if (x)--}}
                {{--return true;--}}
            {{--else--}}
                {{--return false;--}}
        {{--}--}}
    {{--</script>--}}

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
                 Dashboard
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Teams <strong></strong>&nbsp &nbsp                            </h3>

                            <a href="{{route('createUser')}}" class="btn btn-default label-success">+ Add New</a>



                            <a href="{{route('viewUser')}}" class="btn btn-info label-success pull-right" > <i class="glyphicon glyphicon-eye-open"></i> views all</a>
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
                                        <th>S.No.</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $count => $key)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->email}}</td>
                                            <td>{{$key->user_type}}</td>

                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <form action="{{route('showUser')."/".$key->users_id}}"
                                                                  method="get">
                                                                <button type="submit" class="btn btn-info btn-xs">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </form>
                                                        </th>
                                                        <th>
                                                            <form action="{{route('editUser')."/".$key->users_id}}" method="get">
                                                                <button type="submit" class="btn btn-success btn-xs">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                            </form>
                                                        </th>
                                                        <th>
                                                            <form class="client" action="{{route('destroyUser')}}" method="post" onsubmit=" return ConfirmDelete()">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="id" value="{{$key->users_id}}">
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
                        <div class="col-md-12" align="center">{{ $users->links() }}</div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>


@endsection