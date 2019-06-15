@extends('layouts.backend')

@section('title', 'Create Booking')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Booking
      </h1>
      
    </section>

    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Create <strong style="color: #5fa7da">Booking</strong>&nbsp &nbsp</h3>
                </div>
               
                <div class="box-body">   
                    
                    <form action="{{route('storeBooking')}}" method="post"  enctype="multipart/form-data">
                    {{csrf_field()}}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Traveller Name: *</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                    <select name="travellers_id" id="" class="form-control">
                                        @foreach($travellers as $key)
                                            <option value="{{$key->travellers_id}}">{{$key->email}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text text-danger">{{$errors->first('travellers_id')}}</small>
                                </div>
                          </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Guest: *</label></div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-user"></i>
                                                     </div>
                                                </div>
                                    <select name="guests_id" id="" class="form-control">
                                        @foreach($guests as $key)
                                            <option value="{{$key->guests_id}}">{{$key->contact}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text text-danger">{{$errors->first('guests_id')}}</small>
                                </div>
                            </div>
                            </div>
                        </div>

                    
                        <div class="form-group"> 
                            <div class="row">
                                    <div class="col-md-3"><label>Bus: *</label></div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-bus"></i>
                                                     </div>
                                                </div>
                                    <select name="buses_id" id="" class="form-control">
                                        @foreach($buses as $key)
                                            <option value="{{$key->buses_id}}">{{$key->buses_title}}</option>
                                        @endforeach
                                    </select>
                                    <small class="text text-danger">{{$errors->first('buses_id')}}</small>
                                </div>
                            </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row " >
                                <div class="col-md-3"><label>Seat: *</label></div>
                                <div class="col-md-9">
                                   <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-support"></i>
                                                     </div>
                                                </div>
                                        <input type="text" name="seat" class="form-control" placeholder="Select Your Seat" required >

                                    <small class="text text-danger">{{$errors->first('seat')}}</small>
                                </div>
                            </div>
                        </div>
                        </div>
                   
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><label>Price: *</label></div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-dollar"></i>
                                                     </div>
                                                </div>
                                    <input type="text" class="form-control" name="price" placeholder="Total Price " required>
                                    <small class="text text-danger">{{$errors->first('price')}}</small>
                                </div>
                            </div>
                        </div>
                        </div>
                  

                        <div class="form-group">
                            <div class="row" >
                                <div class="col-md-3"><label>Profile: *</label></div>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-check"></i>
                                                     </div>
                                                </div>
                                        <select name="profile" id="profile" class="form-control">
                                            <option value="confirmed">confirmed  </option>
                                            <option value="cancelled">cancelled </option>
                                            <option value="pending">pending </option>
                                        </select>
                                        <small class="text text-danger">{{$errors->first('profile')}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                      

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div align="center">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                            Save Changes
                                        </button>
                                        &nbsp &nbsp
                                        <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                            Cancel &nbsp &nbsp
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