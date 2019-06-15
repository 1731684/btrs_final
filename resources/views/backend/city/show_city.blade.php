@extends('layouts.backend')

@section('title', 'View city')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                City Dashboard
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">View <strong style="color: #5fa7da">City</strong>&nbsp &nbsp</h3>
                        </div>

                        <div class="box-body">
                    <div class="col-md-3">&nbsp;
                    </div>
                    <div class="col-md-9">
                        <div class="col-md-3"><strong>Title : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="{{$city->cities_title}}" disabled>
                        </div>

                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div align="center">
                        <a href="{{route('cities')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </section>
@endsection