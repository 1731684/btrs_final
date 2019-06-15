@include('branches.header')


<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
        });
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

<section id="about-us" class=" page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a href="{{route('schedulesVendor')}}" class="btn btn-info form-control"
                   style="color: white; background-color:#23b9ca;">Your Schedules</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('vehiclesVendor')}}" class="btn btn-info form-control"
                   style="color: white; background-color:#23b9ca;">Your Vehicles</a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('bookingsVendor')}}" class="btn btn-info form-control"
                   style="color: white; background-color:#23b9ca;">Your Bookings</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-4"><a href="{{route('createSchedulesVendor')}}" class="btn btn-default">+ Add New</a></div>
        <div class="col-md-4">
            <div class="section-title" data-animation="fadeInUp">
                <h2 class="title">Your Schedules</h2>
            </div>
        </div>
        <div class="col-md-4">&nbsp;</div>
        <div class="row text-center">
            <div class="col-md-12">
                <div class=" panel-body">
                    <table class="table  table-hover ">
                        <thead>
                        <tr>
                            <th class="text-center">S.No.</th>
                            <th class="text-center">Bus</th>
                            <th class="text-center">Departure Date</th>
                            <th class="text-center">Departure Time</th>
                            <th class="text-center">Shift</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schedules as $count => $key)
                            <tr>
                                <td>{{++$count}}</td>
                                <td>{{$key->title}}</td>
                                <td>{{$key->departure_date}}</td>
                                <td>{{$key->departure_time}}</td>
                                <td>{{$key->shift}}  </td>
                                <td>
                                    <table>
                                        <tr>
                                            <th>
                                                <form action="{{route('showSchedulesVendor')."/".$key->schedules_id}}"
                                                      method="get">
                                                    <button type="submit" class="btn btn-info btn-xs">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </form>
                                            </th>
                                            <th>&nbsp;</th>
                                            <th>
                                                <form action="{{route('editSchedulesVendor')."/".$key->schedules_id}}"
                                                      method="get">
                                                    <button type="submit" class="btn btn-success btn-xs">
                                                        <i class="fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </th>
                                            <th>&nbsp;&nbsp;</th>
                                            <th>
                                                <form class="client" action="{{route('destroySchedulesVendor')}}" method="post"
                                                      onsubmit=" return ConfirmDelete()">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="id" value="{{$key->schedules_id}}">
                                                    <button type="submit" class="btn btn-danger btn-xs">
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
                </div>
            </div>
            <div class="col-md-12" align="center">{{ $schedules->links() }}</div>
        </div>


    </div>
  </section>
<script>
    function ConfirmDelete() {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
</script>

@include('branches.footer')

