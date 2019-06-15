@extends('layouts.backend')

@section('title', 'Create Route')

@section('content')

    <script>
        var room = 1;

        function education_fields() {

            room++;
            var objTo = document.getElementById('education_fields')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass" + room);
            var rdiv = 'removeclass' + room;
            divtest.innerHTML = '<div class="col-md-6 nopadding"><div class="form-group"><div class="input-group"> ' +
                ' <select class="form-control" id="educationDate" name="destination[]">\n' +
                '                                                <option value="">Select City</option>\n' +
                '                                                @foreach($cities as $key => $value)\n' +
                '                                                    <option value="{{$value->cities_title}}">{{$value->cities_title}}</option>\n' +
                '                                                @endforeach\n' +
                '                                            </select><div class="input-group-btn">' +
                ' <button class="btn btn-danger" type="button" onclick="remove_education_fields(' + room + ');">' +
                ' <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

            objTo.appendChild(divtest)
        }

        function remove_education_fields(rid) {
            $('.removeclass' + rid).remove();
        }

        function submitForm() {
            $('.route-form').submit();
        }

    </script>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Route
            </h1>

        </section>
        <form action="{{route('storeRoute')}}" method="post">
            {{@csrf_field()}}
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Create <strong style="color: #5fa7da">Route</strong>&nbsp &nbsp
                                </h3>
                                <a href="{{route('cities')}}">view cities</a>

                                <button class="btn btn-info label-success pull-right">
                                    <i class="glyphicon glyphicon-plus"></i>Submit
                                </button>


                            </div>
                            <div class="box-body">


                                <div id="education_fields">

                                </div>

                                <div class="col-md-6 nopadding">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" id="educationDate" name="destination[]">
                                                <option value="">Select City</option>
                                                @foreach($cities as $key => $value)
                                                    <option value="{{$value->cities_title}}">{{$value->cities_title}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <button class="btn btn-success" type="button"
                                                        onclick="education_fields();"><span
                                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-footer">
                                        <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add
                                            another form field :)
                                        </small>
                                        ,
                                        <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove
                                            form field :)
                                        </small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
@endsection
