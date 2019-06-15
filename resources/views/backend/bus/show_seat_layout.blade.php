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

    /*.seats {*/
    /*background: #bababa;*/
    /*min-height: 30px;*/
    /*min-width: 30px;*/
    /*}*/

    .busSeat input[type='text'] {
        background: #5fa7da;;
        text-align: center;
    }

    .busSeat .front input[type='text'] {
        background: #33b7b1;;
        text-align: center;
    }

    .smhtn .btn{
        display: inline-flex;
    }

</style>

<section id="about-us" class=" page-section">

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="busSeat">
                    <span style="color: red">Bus Seat Layout</span>
                    <div class="row ">
                        <div class="col-md-11">
                            <div class="bus">
                                @foreach($seat as $key => $item)
                                    <div class="col-md-1">
                                        <div class="seats" data-id="{{$key}}" style="{{$item['style']}}">
                                            <div class="special-attributes"></div>
                                           11B
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="front">
                                <div class="col-md-1">
                                    <div class="seats" data-id="0" style="{{$front[0]['style']}}">
                                        <div class="special-attributes"></div>
                                        D
                                        {{--<input type="text" name="seat[0]" value="" placeholder="Driver"/>--}}
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="seats" data-id="1" style="{{$front[1]['style']}}">
                                        <div class="special-attributes"></div>
                                        E
                                        {{--<input type="text" name="seat[1]" value="" placeholder="Entry"/>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">&ensp;</div>
            <div class="row">&ensp;</div>
            <div class="row smhbtn" align="center">
                <div class="col-md-7 col-md-offset-5" style="display: inline-flex;">
                    <form action="{{route('buses')}}" method="post">
                        {{@csrf_field()}}
                        <input type="hidden" id="seatLayout" name="seatLayout" value="">
                        <input type="hidden" id="frontLayout" name="frontLayout" value="">
                        <input type="hidden" name="id" value="{{$busId}}">
                        <button type="submit" class="btn btn-primary submit-layout">Proceed</button>
                    </form>
                    <form action="{{route('editSeatLayout')."/".$busId}}}}" method="post" >
                        {{@csrf_field()}}
                        &ensp;<button class="btn btn-danger"><i class="fa fa-edit"></i>Action</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</section>

@include('branches.footer')

