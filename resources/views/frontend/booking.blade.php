@include('branches.header')

<style>
    .info2 {
        border: 2px dashed red;
    }
    .info {
        transform: translate(1050px, -280px);

    }

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
    }

    .front .seats {
        background: salmon;
    }

    /* Hide the browser's default checkbox */
    .seats input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .smhtn .btn {
        display: inline-flex;
    }
    .activeSeat{
        background: red;
        color: #fff;
        pointer-events: none;
        
    }

</style>

<section id="about-us" class=" page-section">

    <div class="container">
        <div class="row">
            <div class="col-md-4"><h1 class="h3 text-center text-danger">1.Select your route</h1>
            </div>
            <div class="col-md-4"><h1 class="h3 text-center text-primary">2.Select your Seat</h1>
            </div>
            <div class="col-md-4"><h1 class="h3 text-center text-danger">3.Book your ticket</h1>
            </div>
        </div>
        <form action="{{route('passengerDetail')}}" method="post">
            {{@csrf_field()}}
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="busSeat">
                        <span style="color: red">Bus Seat Layout</span>
                        <div class="row">
                            <div class="col-md-11">
                             <div class="bus">
                                  @foreach($seat as $key => $item)
                                 <div class="col-md-1">
                                  <div class="seats back seats  
                                  {{!empty($bookingSeets[$item['name']])?'activeSeat':''}}"
                                     data-id="{{$key}}">
                                    <div class="special-attributes"></div>
                                   @if(isset($item['name'])){{$item['name']}}@else 11A @endif
                                    <input type="checkbox" name="seat_id[]" id="{{$key}}" value=" 
                                    {{$key}}">
                                   </div>
                                    </div>

                                  @endforeach
                                   </div>
                                <div class="front">
                                    <div class="col-md-1">
                                        <div class="seats" data-id="0" style="{{$front[0]['style']}}">
                                            <div class="special-attributes"></div>
                                            @if(isset($front[0]['name'])){{$front[0]['name']}}@else D @endif
                                            {{--<input type="text" name="seat[0]" value="" placeholder="Driver"/>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="seats" data-id="1" style="{{$front[1]['style']}}">
                                            <div class="special-attributes"></div>
                                            @if(isset($front[1]['name'])){{$front[1]['name']}}@else E @endif

                                            {{--<input type="text" name="seat[1]" value="" placeholder="Entry"/>--}}
                                        </div>
                                        <div>                                                             
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <input type="hidden" name="buses_id" value="{{$buses_id}}">
                    <input type="hidden" name="schedules_id" value="{{$schedules_id}}">
                    <button class=" btn btn-sm pull-right btn-success" type="submit">Proceed <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
                <div>
                <div class="col-md-4 info">
                    <p>Available Seat : 
                    <div class="seats" data-id="0" style="{{$front[0]['style']}}">
                    </p>
                </div>
                <div>
                    <p>Booked seat : 
                    <div class="seats activeSeat" data-id="0" style="{{$front[0]['style']}}">
                    </p>
                </div>
                </div>
            </div>
        </form>
    </div>


</section>

<script>
    $(document).ready(function () {
        $('.bus').find('.back').click(function () {
            var checked = $(this).find(":input").is(':checked');
            if (!checked) {
                $(this).find(":input").attr('checked', true);
                $(this).find(':input').prop('checked', true);
                $(this).css({"background": "red"});
                
            } else {
                $(this).find(":input").attr('checked', false);
                $(this).find(':input').prop('checked', false);
                $(this).css({"background": "#5fa7da"});
            }

        });

    });
    
</script>
<script type="text/javascript">
$(document).ready(function() {        
    $(".book").click(function(event) {
        var total = 1200*$item;
        $(".book:checked").each(function() {
            total += parseInt($(this).val());
        });
        
        if (total == 0) {
            $('#amount').val('');
        } else {                
            $('#amount').val(total);
        }
    });
});    
</script>

@include('branches.footer')


{{--<style>--}}
{{--.busSeat {--}}
{{--min-height: 403px;--}}
{{--border: 1px dashed red;--}}
{{--margin-top: 20px;--}}
{{--border-radius: 60px;--}}
{{--}--}}

{{--.seats {--}}
{{--width: 40px;--}}
{{--border-radius: 10px;--}}
{{--display: flex;--}}
{{--flex-direction: column;--}}
{{--justify-content: center;--}}
{{--margin: 13px;--}}
{{--height: 45px;--}}
{{--background: salmon;--}}
{{--transition: box-shadow 0.3s ease-in-out;--}}
{{--cursor: -webkit-grab;--}}
{{--}--}}

{{--.seats:hover {--}}
{{--box-shadow: 0 2px 7px 1px rgba(43, 59, 93, 0.29);--}}
{{--}--}}

{{--.seats:active {--}}
{{--cursor: -webkit-grabbing;--}}
{{--box-shadow: 0 5px 15px 4px rgba(43, 59, 93, 0.29);--}}
{{--}--}}

{{--/*.seats {*/--}}
{{--/*background: #bababa;*/--}}
{{--/*min-height: 30px;*/--}}
{{--/*min-width: 30px;*/--}}
{{--/*}*/--}}

{{--.bus input[type='text'] {--}}
{{--background: grey;--}}
{{--text-align: center;--}}
{{--}--}}

{{--/* The container */--}}
{{--.boxcontainer {--}}
{{--display: block;--}}
{{--position: relative;--}}
{{--padding-left: 35px;--}}
{{--margin-bottom: 12px;--}}
{{--cursor: pointer;--}}
{{--font-size: 22px;--}}
{{---webkit-user-select: none;--}}
{{---moz-user-select: none;--}}
{{---ms-user-select: none;--}}
{{--user-select: none;--}}
{{--}--}}

{{--/* Hide the browser's default checkbox */--}}
{{--.boxcontainer input {--}}
{{--position: absolute;--}}
{{--opacity: 0;--}}
{{--cursor: pointer;--}}
{{--}--}}

{{--/* Create a custom checkbox */--}}
{{--.checkmark {--}}
{{--position: absolute;--}}
{{--top: 0;--}}
{{--left: 0;--}}
{{--height: 25px;--}}
{{--width: 25px;--}}
{{--background-color: #eee;--}}
{{--}--}}

{{--/* On mouse-over, add a grey background color */--}}
{{--.boxcontainer:hover input ~ .checkmark {--}}
{{--background-color: #blue;--}}
{{--}--}}

{{--/* When the checkbox is checked, add a blue background */--}}
{{--.boxcontainer input:checked ~ .checkmark {--}}
{{--background-color: #2196F3;--}}
{{--}--}}

{{--/* Create the checkmark/indicator (hidden when not checked) */--}}
{{--.checkmark:after {--}}
{{--content: "";--}}
{{--position: absolute;--}}
{{--display: none;--}}
{{--}--}}

{{--/* Show the checkmark when checked */--}}
{{--.boxcontainer input:checked ~ .checkmark:after {--}}
{{--display: block;--}}
{{--}--}}

{{--/*.squaredOne {*/--}}
{{--/*width: 28px;*/--}}
{{--/*height: 28px;*/--}}
{{--/*position: relative;*/--}}
{{--/*margin: 20px auto;*/--}}
{{--/*background: #fcfff4;*/--}}
{{--/*background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);*/--}}
{{--/*box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);*/--}}
{{--/*}*/--}}
{{--/*.squaredOne label {*/--}}
{{--/*width: 20px;*/--}}
{{--/*height: 20px;*/--}}
{{--/*position: absolute;*/--}}
{{--/*top: 4px;*/--}}
{{--/*left: 4px;*/--}}
{{--/*cursor: pointer;*/--}}
{{--/*background: linear-gradient(to bottom, #222222 0%, #45484d 100%);*/--}}
{{--/*box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px white;*/--}}
{{--/*}*/--}}
{{--/*.squaredOne label:after {*/--}}
{{--/*content: '';*/--}}
{{--/*width: 16px;*/--}}
{{--/*height: 16px;*/--}}
{{--/*position: absolute;*/--}}
{{--/*top: 2px;*/--}}
{{--/*left: 2px;*/--}}
{{--/*background: #27ae60;*/--}}
{{--/*background: linear-gradient(to bottom, #27ae60 0%, #145b32 100%);*/--}}
{{--/*box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);*/--}}
{{--/*opacity: 0;*/--}}
{{--/*}*/--}}
{{--/*.squaredOne label:hover::after {*/--}}
{{--/*opacity: 0.3;*/--}}
{{--/*}*/--}}
{{--/*.squaredOne input[type=checkbox] {*/--}}
{{--/*visibility: hidden;*/--}}
{{--/*}*/--}}
{{--/*.squaredOne input[type=checkbox]:checked + label:after {*/--}}
{{--/*opacity: 1;*/--}}
{{--/*}*/--}}

{{--</style>--}}

{{--<section id="about-us" class=" page-section">--}}

{{--<div class="container">--}}
{{--<form action="{{route('passengerDetail')}}" method="post">--}}
{{--<div class="row">--}}
{{--<div class="col-md-6">--}}

{{--<button type="submit" class="btn btn-primary form-control submit-layout">Select Seats</button>--}}

{{--</div>--}}

{{--<div class="col-md-6">--}}

{{--{{@csrf_field()}}--}}
{{--<input type="hidden" name="buses_id" value="{{$buses_id}}">--}}
{{--<input type="hidden" name="schedules_id" value="{{$schedules_id}}">--}}
{{--<button type="submit" class="btn btn-danger form-control submit-layout"><i--}}
{{--class="fa fa-chevron"></i>Proceed--}}
{{--</button>--}}

{{--</div>--}}
{{--</div>--}}

{{--<div class="row busSeat">--}}
{{--<div class="col-md-11">--}}
{{--<div class="bus">--}}
{{--@foreach($seat as $key => $item)--}}
{{--<div class="col-md-1">--}}
{{--<div class="seats" data-id="{{$key}}" style="{{$item['style']}}">--}}
{{--<!-- <input type="checkbox" name="seat_id[]" id="{{$key}}" class="hh" value="{{$key}}"/> -->--}}
{{--<label class="boxcontainer">--}}
{{--<input type="checkbox" name="seat_id[]" id="{{$key}}" class="hh" value="{{$key}}">--}}
{{--<span class="checkmark"></span>--}}
{{--</label>--}}
{{--<input type="text" name="seat[{{$key}}]" value="AA"--}}
{{--placeholder="Seat No" disabled/>--}}
{{--<div class="special-attributes"></div>--}}
{{--<div class="squaredOne">--}}
{{--<input type="checkbox" value="None" id="squaredOne" name="check"  />--}}
{{----}}
{{--<label for="squaredOne"></label>--}}
{{----}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-md-1">--}}
{{--<div class="front">--}}
{{--<div class="seats" data-id="0" style="{{$front[0]['style']}}">--}}
{{--<div class="special-attributes"></div>--}}
{{--<input type="text" name="seat[0]" value="D" disabled--}}
{{--placeholder="Driver"/>--}}
{{--</div>--}}
{{--<div class="seats" data-id="1" style="{{$front[1]['style']}}">--}}
{{--<div class="special-attributes"></div>--}}
{{--<input type="text" name="seat[1]" value="E" disabled--}}
{{--placeholder="Entry"/>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}

{{--</section>--}}

{{--<script>--}}


{{--$(document).ready(function () {--}}
{{--$('.seats').click(function () {--}}
{{--$(this).child().attr('checked', true);--}}
{{--});--}}
{{--});--}}


{{--</script>--}}
{{--@include('branches.footer')--}}

