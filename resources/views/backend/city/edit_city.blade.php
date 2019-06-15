@extends('layouts.backend')

@section('title', 'Edit City')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        City
      </h1>
      
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit <strong style="color: #5fa7da">City</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">
                <form action="{{route('updateCity')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$city->cities_id}}">
                        


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><strong>Title : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="cities_title" value="{{$city->cities_title}}" required>
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div align="center">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                        Save Changes
                                    </button>&nbsp;&nbsp;
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                        Cancel&nbsp;&nbsp;
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
@endsection