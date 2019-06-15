@extends('layouts.backend')

@section('title', 'Create FAQ')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        FAQ
      </h1>
      
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit <strong style="color: #5fa7da">FAQ</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">
                <form action="{{route('updatefaq')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$faq->faq_id}}">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                {{--<div class="col-md-3"><strong>Question : *</strong></div>--}}
                                
                                    <input type="text" class="form-control" name="question" value="{{$faq->question}}"  required>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                                {{--<div class="col-md-3"><strong>Answer : *</strong></div>--}}
                                <div class="col-md-12">
                                    <textarea class="form-control ckeditor" name="answer" rows="7" style="resize: none" maxlength="255" required>
                                        {{$faq->answer}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-12">
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