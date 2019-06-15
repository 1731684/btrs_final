@extends('layouts.frontend')
@section('content')
<section id = "about-us" class = "page-section">
<div class = "container">
    <!-- heading -->
    <!-- <div class = "section-title" data-animation = "fadeInUp">
        <h1 class = "title">User's History</h1>
    </div> -->

<!-- Book details -->
<div class="col-md-4 col-sm-6">
    <div class="panel panel-body panel-primary">

        <!-- <div class = "section-title" data-animation = "fadeInUp">
            <h1 class = "title" style="font-size: 20px">History Details 1</h1>
        </div> -->

        <div class="row">
            <div class="col-md-6">
                <input type="radio" name="way"  value="one way"> &nbsp One Way
            </div>        
            <div class="col-md-6">        
                <input type="radio" name="way" value="two way"> &nbsp Return(Two Way)
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-6">
                <center><label>Departure</label></center>
                    <input type="text" name="" class="form-control" placeholder="Enter Departure">
            </div>
            

            <div class="col-md-6">
                <center><label>Arrival</label></center>
                    <input type="text" name="" class="form-control" placeholder="Enter Arrival">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <center><label>Departure Date</label></center>
                    <input type="date" name="" class="form-control" placeholder="Enter Departure">
            </div>
            

            <div class="col-md-6">
                <center><label>Arrival Date</label></center>
                    <input type="date" name="" class="form-control" placeholder="Enter Arrival">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <center><label>Discount</label></center>
                    <select name="" class="form-control">
                        <option>5%</option>
                        <option>10%</option>
                        <option>15%</option>
                        <option>20%</option>
                    </select>
            </div>
            <div class="col-md-6" style="margin-top: 34px; text-align: center; text-transform: uppercase;">
                <p><a href="#">Need Any Help?</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>
                  Insure your travel by adding Rs.25 per passenger  
                </p>
                <input type="checkbox" name=""><b  style="font-size: 9px">YES, SECURE MY TRIP WITH INSURANCE. I AGREE WITH TERM AND CONDITIONS</b><br/>
                <input type="checkbox" name=""><b style="font-size: 9px">NO, I AM WILLING TO TAKE RISK OF MY TRIP</b>
                <p>
                  <center><strong style="font-size: 10px">TICKET BY PHONE: 9841512143</strong></center> 
                </p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3" >
                <input type="submit" name="SUBMIT" class="btn btn-primary">
            </div>
        </div>



    </div>          
</div>

</section>
@endsection