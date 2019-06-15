@include('branches.header')


<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(1000, 0).slideUp(1000,0);
    }, 6000);
</script>

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
                <a href="{{route('vehiclesVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Vehicles</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('schedulesVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Schedules</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('bookingsVendor')}}" class="btn btn-info form-control" style="color: white; background-color:#23b9ca;">Your Bookings</a>
            </div>
        </div>
    </div>
    <div class = "container">
        <div class="row">
            <div class="col-md-4"><a href="{{route('createVehiclesVendor')}}" class="btn btn-default">+ Add New</a></div>
            <div class="col-md-4">
                <div class="section-title" data-animation="fadeInUp">
                    <h2 class="title">Vehicles</h2>
                </div>
            </div>
            <div class="col-md-4">&nbsp;</div>
        </div>
        <div class = "row text-center">
            <div class="col-md-12">
                <div class=" panel-body">
                                <table class="table  table-hover ">
                                    <thead>
                                    <tr>
                                        <th class="text-center">S.No.</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Route</th>
                                        <th class="text-center">Bus Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($buses as $count => $key)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$key->title}}</td>
                                            <td>{{$key->bustypes->title}}</td>
                                            <td>{{$key->routes->title}}</td>
                                            <td>
                                               <table>
                                                    <tr>
                                                        <th>
                                                            <form action="{{route('showVehiclesVendor')."/".$key->buses_id}}" method="get">
                                                                <button type="submit" class="btn btn-info ">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            </form>
                                                        </th>
                                                        <th>&nbsp;</th>
                                                        <th>
                                                            <form action="{{route('editVehiclesVendor')."/".$key->buses_id}}" method="get">
                                                                <button type="submit" class="btn btn-success ">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                            </form>
                                                        </th>
                                                        <th>&nbsp;&nbsp;</th>
                                                        <th>
                                                            <form class="client" action="{{route('destroyVehiclesVendor')}}" method="post" onsubmit=" return ConfirmDelete()">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="id" value="{{$key->buses_id}}">
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </button>
                                                            </form>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                        <div class="col-md-12" align="center">{{ $buses->links() }}</div>
                    </div>
            </div>




        </div>
    </div>

</section>
<script>
    function ConfirmDelete()
    {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
</script>

@include('branches.footer')

