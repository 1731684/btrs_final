
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css"
          href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/cupertino/jquery-ui.css"/>

    <style>
        .bus {
            display: inline-block;
        }
        .seats {
            background: #bababa;
            min-height: 30px;
            min-width: 30px;
        }
    </style>
</head>
<body>

<div class="bus">
    @foreach($seat as $key => $item)
    <div class="seats" data-id="{{++$key}}" sytle="{{$item->style}}">
        <h4>{{$key}}</h4>
        <div class="special-attributes"></div>
        <input type="text" name="seat[{{$key}}]" placeholder="Seat Name" />
    </div>
    @endforeach
</div>
</form>
</body>
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

                $('.bus').find('.seats').each(function () {
                    $(this).attr("style", "seat[count].style");
                    // arr[count] = {
                    //     "id": $(this).data('id'),
                    //     "style": $(this).attr('style')
                    // };
                    count++;
                });
                console.log(arr);
                $('#seatLayout').val(JSON.stringify(arr));
            });

    });

</script>
</html>

{{--$.ajax({--}}
{{--type:'POST',--}}
{{--url: '/ecommerce/saveSeatLayout',--}}

{{--data:{--}}
{{--"_token": "{{ csrf_token() }}",--}}
{{--"arr": arr--}}
{{--},--}}
{{--dataType: 'json',--}}
{{--success: function (data) {--}}
{{--console.log(data);--}}
{{--},--}}
{{--error: function (data) {--}}
{{--console.log('Error:', data);--}}
{{--}--}}
{{--});--}}