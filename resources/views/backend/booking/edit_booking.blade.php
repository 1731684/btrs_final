@extends('layouts.backend')

@section('title', 'Edit Bookings')

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
                            <h3 class="box-title">Edit <strong style="color: #5fa7da">Booking</strong>&nbsp &nbsp</h3>
                        </div>

                        <div class="box-body">
                            <form action="{{route('bookings')}}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{$booking->bookings_id}}">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Booker : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$booking->users->email}}" class="form-control"
                                                   disabled>
                                            <small class="text text-danger">{{$errors->first('users_id')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Bus : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control"
                                                   value="{{$booking->buses->buses_title}}" disabled>
                                            <small class="text text-danger">{{$errors->first('buses_id')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Route : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" disabled
                                                   value="{{$booking->routes->routes_title}}">
                                            <small class="text text-danger">{{$errors->first('routes_id')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Departure Date : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" disabled
                                                   value="{{$booking->schedules->departure_date}}">
                                            <small class="text text-danger">{{$errors->first('routes_id')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3"><strong>Bus Number : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="{{$booking->buses->vehicle_no}}"
                                                   disabled>
                                            <small class="text text-danger">{{$errors->first('buses_id')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"><strong>Seat : *</strong></div>
                                        <div class="col-md-9">

                                            <input type="text" value="{{$booking->seat}}" class="form-control" disabled>

                                            <small class="text text-danger">{{$errors->first('seat')}}</small>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"><strong>Price : *</strong></div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="price"
                                                   value="{{$booking->price}}" disabled>
                                            <small class="text text-danger">{{$errors->first('price')}}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row ">
                                        <div class="col-md-3"><strong>Status : *</strong></div>
                                        <div class="col-md-9">
                                            <select name="profile" id="select_profile" class="form-control" disabled>
                                                <option value="confirmed"
                                                        @if($booking->profile=="confirmed") selected @endif>
                                                    confirmed
                                                </option>
                                                <option value="cancelled"
                                                        @if($booking->profile=="cancelled") selected @endif>
                                                    cancelled
                                                </option>
                                                <option value="pending"
                                                        @if($booking->profile=="pending") selected @endif>pending
                                                </option>
                                            </select>
                                            <small class="text text-danger">{{$errors->first('profile')}}</small>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
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
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection