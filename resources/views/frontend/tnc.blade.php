@extends('layouts.frontend')
@section('title', 'Welcome to BTRS')
@section('content')
    <section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 work-section " style="text-align: justify; margin:0px 100px">
                <h3  style="color:#40d4e4;">BTRS - Terms and Conditions</h3>

                @foreach($tnc as $t)
                    {{ $t->description }}
                @endforeach


             </div>
        </div>
    </div>    
</section>
<!-- page-section -->

<div id = "get-quote" class = "bg-color get-a-quote black text-center">
    <div class = "container" data-animation = "pulse">
        <div class = "row">
            <div class = "col-md-12">Do you need Help ?
                <a class = "black" href = "contact">Contact Us</a>
            </div>
        </div>
    </div>
</div>

@endsection
