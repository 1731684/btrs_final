
@extends('layouts.frontend')
@section('content')

    <!-- Added inline css on gender's radio button, agree conditions and submit button. Horizontal row added. Hide/show function added-->
    <div class="container">
        <div class="section-title" data-animation="fadeInUp">
            <h2 class="title"> Booking Deatails</h2>
        </div>
        <div class="row text-center">
            <div class="panel-body">
                <form action="{{route('passengerAdd')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="rows">
                        <div class="col-md-3"><strong> Name : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" name="booker_name" class="form-control" placeholder="Traveller Name">
                            <small class="text text-danger">{{$errors->first('name')}}</small>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="rows">
                        <div class="col-md-3"><strong>Contact : *</strong></div>
                        <div class="col-md-9">
                            <input type="text" name="booker_contact" class="form-control" placeholder="Contact No:">
                            <small class="text text-danger">{{$errors->first('contact')}}</small>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div class="rows">
                        <div class="col-md-3"><strong>Boarding point : *</strong>
                        </div>
                        
                         
                        <div class="col-md-9
                         ">
                            <!--<input type="text" name="booker_address" value="" class="form-control" placeholder="address">-->
                            <select name="boarding_point" class="form-control" id="destination" placeholder="">
                                    
                            <option value="Thellipalai Junction">Thellipalai Junction</option>
                            <option value="Mallakam Jucntion">Mallakam Jucntion</option>
                            <option value="Chunnakam">Chunnakam</option>
                            <option value="Chunnakam Jet Motors">Chunnakam Jet Motors</option>
                            <option value="Chunnakam Food City">Chunnakam Food City</option>
                            <option value="Rotti Aalady">Rotti Aalady</option>
                            <option value="Inuvil Kovil Vaasal Junction">Inuvil Kovil Vaasal Junction</option>
                            <option value="Thavady">Thavady</option>
                            <option value="Kulappiddy">Kulappiddy</option>
                            <option value="Punaari Madam Selva Mahal">Punaari Madam Selva Mahal</option>
                            <option value="Kotehena Muththu Booking Center">Kotehena Muththu Booking Center</option>
                            <option value="Pannai Bus Stand">Pannai Bus Stand</option>
                            <option value="Jaffna Hospital">Jaffna Hospital</option>
                            <option value="Jaffna Prision">Jaffna Prision</option>
                            <option value="Jaffna Philip Nursing Home">Jaffna Philip Nursing Home</option>
                            <option value="Nallur Kovil">Nallur Kovil</option>
                            <option value="Nallur Kiddu Ponga">Nallur Kiddu Ponga</option>
                            <option value="Kacheri Nallur Road">Kacheri Nallur Road</option>
                            <option value="Kacheri">Kacheri</option>
                            <option value="Navatkuli Junction">Navatkuli Junction</option>
                            <option value="Maampalam Junction">Maampalam Junction</option>
                            <option value="Nedunkulam Junction">Nedunkulam Junction</option>
                            <option value="Kaithady Junction">Kaithady Junction</option>
                            <option value="Kaithady Vairava Kovil">Kaithady Vairava Kovil</option>
                            <option value="Nunavil Police Station">Nunavil Police Station</option>
                            <option value="Chavakacheri EPDP Camp">Chavakacheri EPDP Camp</option>
                            <option value="Changaththanai School">Changaththanai School</option>
                            <option value="Meesalai Puttur Junction">Meesalai Puttur Junction</option>
                            <option value="Kodikamam">Kodikamam</option>
                            <option value="Mirusuvil">Mirusuvil</option>
                            <option value="Ushan">Ushan</option>
                            <option value="Puthukaadu">Puthukaadu</option>
                            <option value="Palai">Palai</option>
                            <option value="Iyankachchi">Iyankachchi</option>
                            <option value="Paranthan Junction">Paranthan Junction</option>
                            <option value="Kilinochchi">Kilinochchi</option>
                            <option value="Kilinochchi Water Tank">Kilinochchi Water Tank</option>
                            <option value="Kilinochchi Kacheri">Kilinochchi Kacheri</option>
                            <option value="Kilinochchi Depot Junction">Kilinochchi Depot Junction</option>
                            <option value="Kilinochchi Hospital">Kilinochchi Hospital</option>
                            <option value="Murugandi">Murugandi</option>
                            <option value="Maankulam">Maankulam</option>
                            <option value="Kanakarayankulam">Kanakarayankulam</option>
                            <option value="Puliyankulam">Puliyankulam</option>
                            <option value="Vavuniya Hospital">Vavuniya Hospital</option>
                            <option value="Medawachchiya">Medawachchiya</option>
                            <option value="Anuradhapura Railway Station<">Anuradhapura Railway Station</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Chillaw">Chillaw</option>
                            <option value="Negombo">Negombo</option>
                            <option value="Airport Junction">Airport Junction</option>
                            <option value="Sethuva">Sethuva</option>
                            <option value="Kandana">Kandana</option>
                            <option value="Wattala">Wattala</option>
                            <option value="Peliyakoda">Peliyakoda</option>
                            <option value="Thotalanga">Thotalanga</option>
                            <option value="Stadium">Stadium</option>
                            <option value="Armour Street">Armour Street</option>
                            <option value="Pettah">Pettah</option>
                            <option value="Galleface">Galleface</option>
                            <option value="Kollupitty">Kollupitty</option>
                            <option value="Bampalapitty">Bampalapitty</option>
                            <option value="Wellawatta">Wellawatta</option>
                            

                            </select>
                            <small class="text text-danger">{{$errors->first('address')}}</small>
                        </div>
                       
                    </div>            
                    <div class="col-md-12">&nbsp;</div>
                    <div class="rows ">
                        <div class="col-md-3"><strong>Gender : *</strong></div>
                        <div class="col-md-9" style="text-align: left; padding-left: 30px">
                            <div class="row">
                                <label for="male">
                                    <input type="radio" name="booker_gender" value="male"> Male &nbsp;&nbsp;
                                </label>
                                <label for="female">
                                    <input type="radio" name="booker_gender" value="female"> Female &nbsp;&nbsp;
                                </label>
                                <label for="other">
                                    <input type="radio" name="booker_gender" value="other"> Other &nbsp;&nbsp;
                                </label>
                                <small class="text text-danger">{{$errors->first('profile')}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        &nbsp;
                        <div class="row">
                            <div class="col-md-12" style="padding-left: 100px">
                                <hr style="border: solid 0.5px">

                                <div class="row" style="text-align: left; padding-left: 20px">

                                    <strong>Passenger's Information &nbsp; : &nbsp;&nbsp;</strong>
                                    <!-- checkbox for show/hide function of the passengersInfo div-->
                                    <input type="checkbox" name="passengersInfo"
                                           onchange="showhide(document.getElementById('passengersInfo'))"> Hide

                                </div>

                                <hr style="border: solid 0.5px">

                            </div>

                        </div>
                    </div>
                    <!-- passengersInfo with hide/show option, script given at the bottom with showhide(which) function-->
                    <div id="passengersInfo">
                        <input type="hidden" name="buses_id" value="{{$buses_id}}">
                        <input type="hidden" name="schedules_id" value="{{$schedules_id}}">
                        <div class="row " id="info_passenger">
                            @foreach($seat_data as $key => $no)
                                <div class="col-md-12">&nbsp;</div>
                                <div class="rows">
                                    <div class="col-md-3"><strong>Seat No :{{$no['name']}} </strong></div>
                                    <input type="hidden" name="seat[{{$key}}]" class="form-control"
                                           id="validationDefault02"
                                           placeholder="Seat No" value="{{$no['name']}}">

                                    <div class="col-md-3 mb-3">
                                        {{--<label for="validationDefault01">Name</label>--}}
                                        <input type="text" name="name[{{$key}}]" class="form-control"
                                               id="validationDefault01" placeholder="First name">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        {{--<label for="validationDefault02">Gender</label>--}}
                                        <select name="gender[{{$key}}]" id="" class="form-control">
                                            <option value="" selected>Gender</option>
                                            <option type="text" value="male" id="validationDefault02">Male</option>
                                            <option type="text" value="female" id="validationDefault02">Female</option>
                                            <option type="text" value="other" id="validationDefault02">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        {{--<label for="validationDefault02">Age</label>--}}
                                        <input type="text" name="age[{{$key}}]" class="form-control"
                                               id="validationDefault02" placeholder="Age">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    &nbsp; &nbsp;

                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6" style="text-align: left">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2"
                                           required>
                                    <label class="form-check-label" for="invalidCheck2">
                                        Agree to terms and conditions
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: left">
                            <div class="col-md-3">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                submit
                            </button>
                        </div>
                    </div>


                </form>
            </div>

        </div>
    </div>
<style type="text/css">
    
    

</style>

    <script>
       /* function activeDiv(which) {
        #sel1.hide

        }*/
        function activeDiv(which) {
        if ($routetitle=='Colombo - Jaffna') {
            activeDiv.hide
        }

        }

        function showhide(which) {
            if (!document.getElementById)
                return;
            if (which.style.display == "none")
                which.style.display = "block";
            else {
                which.style.display = "none";
            }
        }

    </script>
@endsection

