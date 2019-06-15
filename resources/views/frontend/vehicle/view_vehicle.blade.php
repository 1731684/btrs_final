@include('branches.header')
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

            <div class="col-md-6 col-sm-6">
                 <form class="client" action="{{route('createSeatLayout')}}" method="post" onsubmit=" return ConfirmDelete()">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$bus->buses_id}}">
                    <button type="submit" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">
                      Create  Seat Layout
                    </button>
                </form>
            </div>
            <div class="col-md-6 col-sm-6">
                <form class="client" action="{{route('showSeatLayout')}}" method="post" >
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$bus->buses_id}}">
                    <button type="submit" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">
                        View  Seat Layout
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title">View Vehicles</h2>
        </div>
        <div class="row text-center">
            <div class="col-md-9">
                <div class="rows">
                    <div class="col-md-12">
                        <div class="col-md-3"><strong>Name : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" placeholder="Name"
                                   value="{{$bus->title}}" disabled>
                            <small class="text text-danger">{{$errors->first('title')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Bus Number : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="vehicle_no" placeholder="Bus No"
                                   value="{{$bus->vehicle_no}}" disabled>
                            <small class="text text-danger">{{$errors->first('vehicle_no')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;&nbsp;</div>
                        <div class="col-md-3"><strong>Bill Book No : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="Bill Book No" value="{{$bus->billbook_no}}"
                                   disabled>
                            <small class="text text-danger">{{$errors->first('billbook_no')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Bus Type</strong></div>
                        <div class="col-md-9">
                            <input type="text" value="{{$bus->bustypes->title}}" class="form-control" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Route </strong></div>
                        <div class="col-md-9">
                            <input type="text" value="{{$bus->routes->title }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Vendor</strong></div>
                        <div class="col-md-9">
                            <input type="text" value="{{$bus->vendors->email }}" class="form-control" disabled>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Driver1 : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="driver1" placeholder="Driver1" disabled
                                   value="{{$bus->driver1}}">
                            <small class="text text-danger">{{$errors->first('driver1')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Contact No : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact1" disabled value="{{$bus->contact1}}">
                            <small class="text text-danger">{{$errors->first('contact1')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Driver2 : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="driver2" placeholder="Driver2"
                                   value="{{$bus->driver2}}" disabled>
                            <small class="text text-danger">{{$errors->first('driver2')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Contact No : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact2" placeholder="Driver2 Contact"
                                   value="{{$bus->contact2}}" disabled>
                            <small class="text text-danger">{{$errors->first('contact2')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Staff1 : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="staff1" placeholder="Staff1"
                                   value="{{$bus->staff1}}" disabled>
                            <small class="text text-danger">{{$errors->first('staff1')}}</small>
                        </div>
                        <div class="col-md-12">&ensp;</div>
                        <div class="col-md-3"><strong>Contact No : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact3" placeholder="Staff1 Contact"
                                   value="{{$bus->contact3}}" disabled>
                            <small class="text text-danger">{{$errors->first('contact3')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Staff2 : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="staff2" placeholder="Staff2" disabled>
                            <small class="text text-danger">{{$errors->first('staff2')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3"><strong>Contact No : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact4" placeholder="Staff2 Contact"
                                   value="{{$bus->contact4}}" disabled>
                            <small class="text text-danger">{{$errors->first('contact4')}}</small>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-3">&ensp;</div>
                        <div class="col-md-9">
                            <div align="center">
                                <a href="{{route('vehiclesVendor')}}" class="btn btn-success">
                                    <i class="fa fa-check"></i>&nbsp;&nbsp;Go Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <img class="himg" src="{{ url('/img/bus/'.$bus->image) }}" width="280" height="240"/>
            </div>

        </div>
    </div>

</section>

@include('branches.footer')

