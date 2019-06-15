@include('branches.header')

<style>
    .busSeat {

        margin-top: 58px;
        text-align: center;
        min-height: 294px;
        border: 2px dashed red;
        margin-top: 20px;
        border-radius: 21px;
        width: 638px;
    }

    .seats {
        width: 32px;
        border-radius: 7px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .seats {
        margin: 13px;
        height: 37px;
        background: #5fa7da;
        transition: box-shadow 0.3s ease-in-out;
        cursor: -webkit-grab;
    }

    .seats:hover {
        box-shadow: 0 2px 7px 1px rgba(43, 59, 93, 0.29);
    }

    .seats:active {
        cursor: -webkit-grabbing;
        box-shadow: 0 5px 15px 4px rgba(43, 59, 93, 0.29);
    }
/*edited*/
    .seats {
    background: #bababa;
    min-height: 30px;
    min-width: 30px;
    }
/**/
    .busSeat input[type='text'] {
        background: #5fa7da;;
        text-align: center;
    }

    .busSeat .front input[type='text'] {
        background: #33b7b1;;
        text-align: center;
    }


</style>

<section id="about-us" class=" page-section">

    <div class="container">
        {{--seat layout edit--}}
        @if($seat!==null)
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <form action="{{route('createSeatLayout')}}" method="post" class="form-inline">
                            {{@csrf_field()}}
                            <input type="hidden" name="id" value="{{$busId}}">
                            <div class="form-group">
                                <level for="count">No of Seats:</level>
                                <input type="text" name="count" id="count" value="{{$count}}"
                                       class="form-control" placeholder="Enter no of seats">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                       <!--<button class="btn btn-primary">Update</button>-->
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="busSeat">
                        <span style="color: red">Bus Seat Layout</span>
                        <div class="row ">
                            <div class="col-md-11">
                                <div class="bus">
                                    @foreach($seat as $key => $item)
                                        <div class="col-md-1">
                                            <div class="seats" data-id="{{$key}}" style="{{$item['style']}}">
                                                <div class="special-attributes"></div>
                                                <input type="text" name="seat[{{$key}}]" placeholder="Seat Name"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="front">
                                    <div class="col-md-1">
                                        <div class="seats" data-id="0" style="{{$front[0]['style']}}">
                                            <div class="special-attributes"></div>
                                            <input type="text" name="seat[0]" value="" placeholder="Driver"/>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="seats" data-id="1" style="{{$front[1]['style']}}">
                                            <div class="special-attributes"></div>
                                            <input type="text" name="seat[1]" value="" placeholder="Entry"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">&ensp;</div>
                <div class="row">&ensp;</div>
                <div class="row" align="center">
                    <div class="col-md-2">&ensp;</div>
                    <div class="col-md-10">
                        <form action="{{route('saveSeatLayout')}}" method="post">
                            {{@csrf_field()}}
                            <input type="hidden" id="seatLayout" name="seatLayout" value="">
                            <input type="hidden" id="frontLayout" name="frontLayout" value="">
                            <input type="hidden" name="id" value="{{$busId}}">
                            <button type="submit" class="btn btn-danger submit-layout">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        @else
            {{--seat layout create--}}
            <div class="row">

                <div class="col-md-4">
                    <form action="{{route('createSeatLayout')}}" method="post" class="form-inline">
                        {{@csrf_field()}}
                    <div class="row">

                            <input type="hidden" name="id" value="{{$busId}}">
                            <div class="form-group">
                                <level for="count">No of Seats:</level>
                                <input type="text" name="count" id="count" value="{{$count}}"
                                       class="form-control" placeholder="Enter no of seats">
                            </div>

                    </div>
                    <div class="row">
                       <!-- <button class="btn btn-primary">Update</button>-->
                    </div>
                </form>
                </div>
                <div class="col-md-8">
                    <div class="busSeat">
                        <span style="color: red">Bus Seat Layout</span>
                        <div class="row ">
                            <div class="col-md-11">
                                <div class="bus">
                                    @for($i=0;$i<$count;$i++)
                                        <div class="col-md-1">
                                            <div class="seats" data-id="{{$i}}" style="">
                                                <div class="special-attributes"></div>
                                                <input type="text" name="seat[{{$i}}]" value=""
                                                       placeholder="Seat Name"/>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                <div class="front">
                                    <div class="col-md-1">
                                        <div class="seats" data-id="0" style="">
                                            <div class="special-attributes"></div>
                                            <input type="text" name="seat[0]" value="" placeholder="Driver"/>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="seats" data-id="1" style="">
                                            <div class="special-attributes"></div>
                                            <input type="text" name="seat[1]" value="" placeholder="Entry"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">&ensp;</div>
                <div class="row">&ensp;</div>
                <div class="row" align="center">
                    <div class="col-md-2">&ensp;</div>
                    <div class="col-md-10">
                        <form action="{{route('saveSeatLayout')}}" method="post">
                            {{@csrf_field()}}
                            <input type="hidden" id="seatLayout" name="seatLayout" value="">
                            <input type="hidden" id="frontLayout" name="frontLayout" value="">
                            <input type="hidden" name="id" value="{{$busId}}">
                            <button type="submit" class="btn btn-danger submit-layout">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

    @endif


</section>
<script type="text/javascript" src="{{ url('/jasny/jasny-bootstrap.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script>
    var ss;
    $(document).ready(function () {
        $('.seats').draggable({
            appendTo: 'body',
            start: function (event, ui) {
                isDraggingMedia = true;
            },
            stop: function (event, ui) {
                isDraggingMedia = false;
                // blah
            }
        });


        $('.submit-layout').click(function () {
            var arr = [];
            var bus = [];
            $('.bus').find('.seats').each(function () {
                arr[$(this).data('id')] = {
                    "style": $(this).attr('style'),
                    "id":$(this).data('id'),
                    "name":$(this).find(":input").val(),
                    "profile":"",
                };
            });

            $('.front').find('.seats').each(function () {
                bus[$(this).data('id')] = {
                    "style": $(this).attr('style'),
                    "id":$(this).data('id'),
                    "name":$(this).find(":input").val(),
                    "profile":"",
                };
            });
            console.log(arr);
            $('#seatLayout').val(JSON.stringify(arr));
            $('#frontLayout').val(JSON.stringify(bus));

        });


    });

</script>
@include('branches.footer')

