f@extends('layouts.backend')

@section('title', 'Edit Routes')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Route
      </h1>
      
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Show <strong style="color: #5fa7da">Route</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><strong>Title : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" value="{{$route->routes_title}}" disabled >
                                <small class="text text-danger">{{$errors->first('title')}}</small>

                            </div>
                        </div>
                    </div>

                    @foreach ($destination as $key=>$value)
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3"><strong>Location@php echo ++$key; @endphp : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="from" value="@php echo $value @endphp" disabled >
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div align="center">
                                    <a href="{{route('routes')}}" class="btn btn-success">
                                        <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                                    </a>
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