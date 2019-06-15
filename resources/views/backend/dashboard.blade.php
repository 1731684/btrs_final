@extends('layouts.backend')

@section('title', 'Dashboard')
@section('activeDashboard', 'active')

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <section class="content-header">
      <h1>
        
      </h1>
      
    </section>
    <?php
/*
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xl-3 col-12">           
             <div class="row">
          
          <div class="col-md-12">
            <div class="box box-body bg-info">
              <div class="flexbox">
                <div id="linechart" >1,4,3,7,6,4,8,9,6,8,12</div>
                <div class="text-right">
                  <span>New Users</span><br>
                  <span>
                    <i class="ion-ios-arrow-up text-white"></i>
                    <span class="font-size-18 ml-1">113</span>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="box box-body bg-success">
              <div class="flexbox">
                <div id="barchart">1,4,3,7,6,4,8,9,6,8,12</div>
                <div class="text-right">
                  <span>Monthly Sale</span><br>
                  <span>
                    <i class="ion-ios-arrow-up text-white"></i>
                    <span class="font-size-18 ml-1">%80</span>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 d-none d-lg-block">
            <div class="box box-body bg-red">
              <div class="flexbox">
                <div id="discretechart">1,4,3,7,6,4,8,9,6,8,12</div>
                <div class="text-right">
                  <span>Impressions</span><br>
                  <span>
                    <i class="ion-ios-arrow-up text-white"></i>
                    <span class="font-size-18 ml-1">%80</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          
      </div>      
            
        </div>
        <div class="col-xl-9 col-12">         
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Weekly Sales</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle mr-5 text-info"></i>Sunday</h5>
                    </li>
                    <li>
                        <h5><i class="fa fa-circle mr-5 text-danger"></i>Monday</h5>
                    </li>
                </ul>
              <div id="morris-area-chart2" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
      <div class="row">
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">90<small>%</small></span>
              <span class="info-box-text">Store Traffic</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fa fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">41,410</span>
              <span class="info-box-text">User Likes</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-bell"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">760</span>
              <span class="info-box-text">Monthly Sales</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-android"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">2,000</span>
              <span class="info-box-text">Join Members</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
        
      <div class="row">
        <div class="col-md-12 col-lg-4">
            <div class="box">
              <div class="box-header with-border">
                <h5 class="box-title">Top Routes</h5>
                <div class="box-tools pull-right">
                    <ul class="card-controls">
                      <li class="dropdown">
                        <a data-toggle="dropdown" href="#"><i class="ion-android-more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item active" href="#">Today</a>
                          <a class="dropdown-item" href="#">Yesterday</a>
                          <a class="dropdown-item" href="#">Last week</a>
                          <a class="dropdown-item" href="#">Last month</a>
                        </div>
                      </li>
                      <li><a href="#" class="link card-btn-reload" data-toggle="tooltip" title="" data-original-title="Refresh"><i class="fa fa-circle-thin"></i></a></li>
                    </ul>
                </div>
              </div>

              <div class="box-body">
                <div class="text-center py-20">                  
                  <div class="donut" data-peity='{ "fill": ["#ef5350", "#e9ab2e", "#398bf7"], "radius": 78, "innerRadius": 58  }' >9,6,5</div>
                </div>

                <ul class="list-inline">
                  <li class="flexbox mb-5">
                    <div>
                      <span class="badge badge-dot badge-lg mr-1 bg-danger"></span>
                      <span>Jaffna - Colombo</span>
                    </div>
                    <div>953</div>
                  </li>

                  <li class="flexbox mb-5">
                    <div>
                      <span class="badge badge-dot badge-lg mr-1 bg-warning"></span>
                      <span>Colombo - Jaffna</span>
                    </div>
                    <div>813</div>
                  </li>

                  <li class="flexbox">
                    <div>
                      <span class="badge badge-dot badge-lg mr-1 bg-info"></span>
                      <span></span>
                    </div>
                    <div></div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
        <div class="col-xl-8 col-lg-8 col-12">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sales</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
                <ul class="list-inline text-center">
                    <li>
                        <h5><i class="fa fa-circle mr-5 text-success"></i>Bus</h5>
                    </li>
                    <li>
                        <h5><i class="fa fa-circle mr-5 text-secondary"></i>Micro</h5>
                    </li>
                </ul>
              <div class="chart">
                <div class="chart" id="revenue-chart" style="height: 230px;"></div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>      
          
      </div>      
      <!-- /.row -->
      
    
      <!-- /.row -->
    
    </section>*/
?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
