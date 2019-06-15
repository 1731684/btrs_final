@extends('layouts.backend')

@section('title', 'Create TNC')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Terms & Conditions
      </h1>
      
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit <strong style="color: #5fa7da">TNC</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">
                <form action="{{route('updatetnc')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$tnc->tnc_id}}">


                    <div class="row" align="center">
                            <div class="col-md-12">&nbsp;</div>
                            {{--<div class="col-md-3"><strong>Description</strong></div>--}}
                            <div class="col-md-12">
                                <textarea class="form-control ckeditor" name="description" rows="10" style="resize: none" maxlength="255" required>
                                    {{$tnc->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div align="center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                Save Changes
                            </button>&nbsp;&nbsp;
                            <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                Cancel&nbsp;&nbsp;
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div></div>
</section>
</div>
@endsection