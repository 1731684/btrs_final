@include('branches.header')

<!-- Jasny CSS -->
<link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ url('/jasny/jasny-bootstrap-responsive.min.css') }}" />
<!-- himg CSS -->
<link rel="stylesheet" href="{{ url('/css/animation.css') }}" />
<section id="about-us" class=" page-section">
        <div class="container">
            <div class = "section-title" data-animation = "fadeInUp">
                <h2 class ="title">Edit Profile</h2>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="col-sm-12 col-md-12" data-animation="fadeInUp" style="margin-top: 20px;">
                        <div class="work-process-box">
                            <a href="{{route('profileVendor')}}">
                                <div class="active process-content">
                                    <!-- Title -->
                                    <h4 class="title">Profile</h4>
                                    <!-- Description -->
                                    <p>Click here to go back to view Profile</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <form action="{{route('updateProfileVendor')}}" method="post" enctype="multipart/form-data">
                    {{@csrf_field()}}
                <div class="col-md-7">
                    <div class=" panel-body ">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 col-sm-3">Name</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" value="{{$vendor->name}}" name="name" class="form-control"
                                           style="text-transform: uppercase;">
                                </div>
                                <!-- <div class="col-md-4 col-sm-4">
                                    <input type="text" value="lastname" class="form-control" style="text-transform: uppercase;">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 col-sm-3">E-mail</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="email" name="email" value="{{$vendor->email}}" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 col-sm-3">Address</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" name="address" value="{{$vendor->address}}" class="form-control">
                                </div>
                                <!-- <div class="col-md-3 col-sm-3">
                                    <input type="text" value="district" class="form-control">
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <input type="text" value="zone" class="form-control">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-md-3 col-sm-3">Contact</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" name="contact" value="{{$vendor->contact}}" class="form-control">
                                </div>
                                <!-- <div class="col-md-4 col-sm-4">
                                   <input type="text" value="contact2" class="form-control">
                                </div> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">&nbsp;</div>
                                <div class="col-md-4 col-sm-4">
                                    <button class="btn btn-info form-control" style="color: white;background-color:#23b9ca; ">Submit</button>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <button class="btn btn-info form-control" style="color: white;background-color: #dd4a2a; ">Change Password</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-md-2">
                    <div class="control-group">
                        <div class="controls">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 150px; height:150px;">
                                    <img src="{{ url('/img/vendor/'.$vendor->image) }}"/>
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail"
                                     style="width: 150px; height:150px;"></div>
                                <div>
                                    <small class="text text-danger">{{$errors->first('image')}}</small>

                                    <span class="btn btn-file">
												<span class="fileupload-new btn btn-primary">Select image</span>
												<span class="fileupload-exists btn btn-info">Change</span>
                                                    <input type="file" name="image" />
                                                </span>
                                    {{--<a class="btn fileupload-exists btn btn-warning" data-dismiss="fileupload">Remove</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

</section>
<script type="text/javascript" src="{{ url('/jasny/jasny-bootstrap.min.js') }}"></script>

@include('branches.footer')