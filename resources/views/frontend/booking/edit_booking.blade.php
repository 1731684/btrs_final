@include('branches.header')

<!-- Jasny CSS -->
<link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap-responsive.min.css') }}" />
<!-- himg CSS -->
<link rel="stylesheet" href="{{ url('/css/animation.css') }}" />


        <div class="panel-body">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{session()->get('success')}}</strong>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{session()->get('error')}}</strong>
                </div>
            @endif
        </div>

<section id = "about-us" class = " page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Bookings</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Vehicles</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="#" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Schedules</a>
            </div>
        </div>
    </div>
    <div class = "container">
        <div class = "section-title" data-animation = "fadeInUp">
            <h2 class ="title">Edit Booking Info</h2>
        </div>
        <div class = "row text-center">
            <form action="{{route('updateBookingsVendor')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$booking->bookings_id}}">
                        <div class="rows">
                            <div class="col-md-3"><strong>Traveller Name : *</strong></div>
                            <div class="col-md-9">
                            </div>
                            <div class="col-md-9">
                                <select name="travellers_id" id="" class="form-control">
                                    @foreach($travellers as $key)
                                        <option value="{{$key->travellers_id}}"
                                                @if($key->travellers_id==$booking->travellers_id) selected @endif>{{$key->email}}</option>
                                    @endforeach
                                </select>
                                <small class="text text-danger">{{$errors->first('travellers_id')}}</small>
                            </div>
                        </div>

                        <div class="rows">
                            <div class="col-md-3"><strong>Guest Name : *</strong></div>
                            <div class="col-md-9">
                                <select name="guests_id" id="" class="form-control">
                                    @foreach($guests as $key)
                                        <option value="{{$key->guests_id}}"
                                                @if($key->guests_id==$booking->guests_id) selected @endif>{{$key->name}}</option>
                                    @endforeach
                                </select>
                                <small class="text text-danger">{{$errors->first('guests_id')}}</small>
                            </div>
                        </div>

                        <div class="rows">
                            <div class="col-md-3"><strong>Bus : *</strong></div>
                            <div class="col-md-9">
                                <select name="buses_id" id="" class="form-control">
                                    @foreach($buses as $key)
                                        <option value="{{$key->buses_id}}"
                                                @if($key->buses_id==$booking->buses_id) selected @endif>{{$key->title}}</option>
                                    @endforeach
                                </select>
                                <small class="text text-danger">{{$errors->first('buses_id')}}</small>
                            </div>
                        </div>

                        <div class="rows ">
                            <div class="col-md-3"><strong>Seat : *</strong></div>
                            <div class="col-md-9">

                                <input type="text" value="{{$booking->seat}}" class="form-control">

                                <small class="text text-danger">{{$errors->first('seat')}}</small>

                            </div>
                        </div>
                        <div class="rows ">
                            <div class="col-md-3"><strong>Price : *</strong></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="price" value="{{$booking->price}}">
                                <small class="text text-danger">{{$errors->first('price')}}</small>
                            </div>
                        </div>

                        <div class="rows ">
                            <div class="col-md-3"><strong>Status : *</strong></div>
                            <div class="col-md-9">
                                <select name="profile" id="select_profile" class="form-control">
                                    <option value="confirmed" @if($booking->profile=="confirmed") selected @endif>
                                        confirmed
                                    </option>
                                    <option value="cancelled" @if($booking->profile=="cancelled") selected @endif>
                                        cancelled
                                    </option>
                                    <option value="pending" @if($booking->profile=="pending") selected @endif>pending
                                    </option>
                                </select>
                                <small class="text text-danger">{{$errors->first('profile')}}</small>
                            </div>
                        </div>
                        <div class="col-md-12">&ensp;</div>

                        <div class="row">&nbsp;
                            <div class="col-md-12">
                                <div align="center">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                        Save Changes
                                    </button>
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </form>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ url('/jasny/jasny-bootstrap.min.js') }}"></script>
@include('branches.footer')

