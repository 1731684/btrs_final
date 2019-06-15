@extends('layouts.frontend')
@section('content')
    <script>
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);
    </script>

    <section id="about-us" class=" page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <a href="{{route('bookingsVendor')}}" class="btn btn-info form-control"
                       style="color: white; background-color:#23b9ca;">Your Bookings</a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <a href="{{route('vehiclesVendor')}}" class="btn btn-info form-control"
                       style="color: white; background-color:#23b9ca;">Your Vehicles</a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <a href="{{route('schedulesVendor')}}" class="btn btn-info form-control"
                       style="color: white; background-color:#23b9ca;">Your Schedules</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section-title" data-animation="fadeInUp">
                <h2 class="title">View Booking Detail</h2>
            </div>
            <div class="row text-center">
                <div class="col-md-9">
                    <div class="panel-body">
                            <div class="rows">
                                <div class="col-md-3"><strong>Traveller Name : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" value="{{$booking->travellers->email }}" class="form-control"
                                           disabled>
                                </div>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="rows">
                                <div class="col-md-3"><strong>Guest Name : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" value="{{$booking->guests->contact }}" class="form-control"
                                           disabled>
                                </div>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="rows ">
                                <div class="col-md-3"><strong>Bus Name : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{$booking->buses->title}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="rows ">
                                <div class="col-md-3"><strong>Bus Number : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{$booking->buses->vehicle_no}}"
                                           disabled>
                                </div>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="rows ">
                                <div class="col-md-3"><strong>Seat : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" name="seat" class="form-control" value="{{$booking->seat}} "
                                           disabled>
                                </div>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="rows ">
                                <div class="col-md-3"><strong>Price : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="price" value="{{$booking->price}}"
                                           disabled>
                                </div>
                            </div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="rows ">
                                <div class="col-md-3"><strong>Profile : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{$booking->profile}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">&nbsp;</div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div align="center">
                            <a href="{{route('bookingsVendor')}}" class="btn btn-success">
                                <i class="fa fa-check"></i>&nbsp;&nbsp;Go Back
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection

