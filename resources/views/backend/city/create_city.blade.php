@extends('layouts.backend')

@section('title', 'Create city')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CITY
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="breadcrumb-item active">City</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">City <strong></strong>&nbsp &nbsp </h3>

                            <a href="{{route('viewCity')}}" class="btn btn-info label-success pull-right"> <i
                                        class="glyphicon glyphicon-eye-open"></i> views all</a>
                        </div>

                        <div class="box-body">
                            <div class="panel-body">
                                <form action="{{route('storeCity')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="rows">
                                        <div class="col-md-3">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-9">
                                            <div class="col-md-3"><strong>Title : *</strong></div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cities_title"
                                                       placeholder="title" required>
                                                <strong class="text-danger">{{$errors->first('cities_title')}}</strong>
                                            </div>
                                            <div class="col-md-12">&nbsp;</div>

                                            <div align="center">
                                                <button type="submit" class="btn btn-success"><i
                                                            class="fa fa-check"></i>&nbsp;&nbsp;
                                                    Save Changes
                                                </button>
                                                <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
