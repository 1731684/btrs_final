@extends('layouts.backend')

@section('title', 'Create Bus')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Bus
    </h1>

  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12 col-lg-10">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Create <strong style="color: #5fa7da">Bus</strong>&nbsp &nbsp</h3>
          </div>

          <div class="box-body">
            <form action="{{route('storeBus')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}

              {{--<div class="form-group">--}}
                {{--<div class="row">--}}
                  {{--<div class="col-12" align="center">--}}
                    {{--<div class="control-group">--}}
                      {{--<div class="controls">--}}
                        {{--<div class="fileupload fileupload-new" data-provides="fileupload">--}}


                          {{--<div class="fileupload-new thumbnail" style="width: 150px; height:100px;">--}}
                            {{--<img src="{{ url('/img/avatar.jpg') }}"/>--}}
                          {{--</div>--}}
                          {{--<div class="fileupload-preview fileupload-exists thumbnail"--}}
                          {{--style="width: 150px; height:100px;"></div>--}}

                          {{--<span class="btn btn-file" style="margin-top: 30px">--}}
                            {{--<span class="fileupload-new btn btn-primary">Select image</span>&nbsp &nbsp &nbsp--}}
                            {{--<span class="fileupload-exists btn btn-info">Change</span>--}}
                            {{--<input type="file" name="image" required/>--}}
                          {{--</span>--}}
                          {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}

                        {{--</div>--}}
                      {{--</div>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
              {{--</div>--}}


              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Name : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="buses_title" placeholder="Name" required>
                    <small class="text text-danger">{{$errors->first('buses_title')}}</small>
                  </div>
                </div>
              </div>    

              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Bus Number : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="vehicle_no" placeholder="Bus No" required>
                    <small class="text text-danger">{{$errors->first('vehicle_no')}}</small>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Bill Book No : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="address" placeholder="Bill Book No">
                    <small class="text text-danger">{{$errors->first('billbook_no')}}</small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Bus Type</strong></div>
                  <div class="col-md-9">
                    <select name="bustypes_id" id="" class="form-control">
                      @foreach($bustypes as $key)
                      <option value="{{$key->bustypes_id}}">{{$key->bustypes_title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Vendor</strong></div>
                  <div class="col-md-9">
                    <select name="vendors_id" id="" class="form-control">
                      @foreach($vendors as $key)
                      <option value="{{$key->vendors_id}}">{{$key->email}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Bill Book No : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="address" placeholder="Bill Book No">
                    <small class="text text-danger">{{$errors->first('billbook_no')}}</small>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Amenities : *</strong></div>
                  <div class="col-md-9">
                    <textarea class="form-control" name="amenity" id="" cols="70" rows="4" style="resize: none;"></textarea>
                    <small class="text text-danger">{{$errors->first('amenity')}}</small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Short Intro : *</strong></div>
                  <div class="col-md-9">
                    <textarea class="form-control" name="description" id="" cols="60" rows="4" style="resize: none"></textarea>
                    <small class="text text-danger">{{$errors->first('description')}}</small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Contact No : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="contact1" placeholder="Driver1 Contact">
                    <small class="text text-danger">{{$errors->first('contact1')}}</small>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Driver2 : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="driver2" placeholder="Driver2">
                    <small class="text text-danger">{{$errors->first('driver2')}}</small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Contact No : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="contact2" placeholder="Driver2 Contact">
                    <small class="text text-danger">{{$errors->first('contact2')}}</small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Staff1 : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="staff1" placeholder="Staff1">
                    <small class="text text-danger">{{$errors->first('staff1')}}</small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Contact No : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="contact3" placeholder="Staff1 Contact">
                    <small class="text text-danger">{{$errors->first('contact3')}}</small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Staff2 : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="staff2" placeholder="Staff2">
                    <small class="text text-danger">{{$errors->first('staff2')}}</small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-3"><strong>Contact No : *</strong></div>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="contact4" placeholder="Staff2 Contact">
                    <small class="text text-danger">{{$errors->first('contact4')}}</small>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <div align="center">
                      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>
                        Save Changes
                      </button>
                      &nbsp &nbsp &nbsp
                      <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>
                        Cancel
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

<script type="text/javascript" src="{{ url('/jasny/jasny-bootstrap.min.js') }}"></script>
@endsection
