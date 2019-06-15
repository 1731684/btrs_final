@extends('layouts.backend')

@section('title', 'Edit Guest')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Guest
            </h1>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Edit <strong style="color: #5fa7da">Guest</strong>&nbsp &nbsp</h3>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$guest->guests_id}}">
                                    <div class="col-md-3"><strong>Name : *</strong></div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  placeholder="Name"
                                               value="{{$guest->name}}" disabled>
                                        <small class="text text-danger">{{$errors->first('name')}}</small>
                                    </div>
                                </div>
                            </div>




                            {{--<div class="form-group">--}}
                                {{--<div class="row">--}}
                                    {{--<input type="hidden" name="id" value="{{$guest->guests_id}}">--}}
                                    {{--<div class="col-md-3"><strong>Address : *</strong></div>--}}
                                    {{--<div class="col-md-9">--}}
                                        {{--<input type="text" class="form-control"  placeholder="Name"--}}
                                               {{--value="{{$guest->address}}" disabled>--}}
                                        {{--<small class="text text-danger">{{$errors->first('name')}}</small>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><strong>Contact</strong></div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="contact"
                                               value="{{$guest->contact}}" disabled>
                                        <small class="text text-danger">{{$errors->first('contact')}}</small>
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
                                                Cancel &nbsp;&nbsp;
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