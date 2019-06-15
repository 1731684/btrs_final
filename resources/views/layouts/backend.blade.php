<!DOCTYPE html>
<html lang="en">
  
<!--  -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://lion-admin-templates.multipurposethemes.com/lion-admin/images/favicon.ico">

    <title> Admin - Dashboard</title>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:300,400,600">
     

<link rel="stylesheet" type="text/css" href="{{url('/backend/assets/vendor_components/font-awesome/css/font-awesome.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/vendor_components/Ionicons/css/ionicons.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/vendor_components/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/vendor_components/linea-icons/linea.css')}}"> 
<link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/vendor_components/glyphicons/glyphicon.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/vendor_components/flag-icon/css/flag-icon.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/vendor_components/material-design-iconic-font/css/materialdesignicons.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('/backend/assets/vendor_components/simple-line-icons-master/css/simple-line-icons.css')}}">

<link rel="stylesheet" href="{{ url('/backend/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

<link rel="stylesheet" href="{{ url('/backend/assets/vendor_plugins/iCheck/all.css')}}">
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ url('/backend/assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}">
	
	<!-- Bootstrap-extend -->
	<link rel="stylesheet" href="{{ url('/backend/css/bootstrap-extend.css')}}">
	
	<!-- Morris charts -->
	<link rel="stylesheet" href="{{ url('/backend/assets/vendor_components/morris.js/morris.css')}}">
	
	<!-- weather weather -->
	<link rel="stylesheet" href="{{ url('/backend/assets/vendor_components/weather-icons/weather-icons.css')}}">
	
	<!-- date picker -->
	<link rel="stylesheet" href="{{ url('/backend/assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}">
	
	<!-- daterange picker -->
	<link rel="stylesheet" href="{{ url('/backend/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css')}}">
	
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="{{ url('/backend/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css')}}">
	
	<!-- theme style -->
	<link rel="stylesheet" href="{{ url('/backend/css/master_style.css')}}">
	
	<!-- Lion_admin skins -->
	<link rel="stylesheet" href="{{ url('/backend/css/skins/_all-skins.css')}}">

  <link rel="stylesheet" href="{{ url('/backend/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css')}}">


    {{--ckeditor--}}
    <link rel="stylesheet" href="{{url('/ckeditor/content.css')}}">


    <!-- jQuery 3 -->
    <script src="{{ url('/backend/assets/vendor_components/jquery/dist/jquery.js')}}"></script>

	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />


  </head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li>
                    <a href="{{ route('logout') }}" class="glyphicon glyphicon-log-out btn btn-info btn-lg" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
		  
		 {{--
		  @php
          <!-- Messages -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-email"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 5 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{ url('/img/avatar.jpg')}}" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          name
                          <small><i class="fa fa-clock-o"></i> 15 mins</small>
                         </h4>
                         <span>msg.</span>
                      </div>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{ url('/img/avatar.jpg')}}" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          name
                          <small><i class="fa fa-clock-o"></i> 4 hours</small>
                         </h4>
                         <span>msg.</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{ url('/backend/images/user4-128x128.jpg')}}" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          name
                          <small><i class="fa fa-clock-o"></i> Today</small>
                         </h4>
                         <span>mag.</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{ url('/backend/images/user3-128x128.jp')}}g" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          name
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                         </h4>
                         <span>msg.</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="{{ url('/backend/images/user4-128x128.jpg')}}" class="rounded-circle" alt="User Image">
                      </div>
                      <div class="mail-contnet">
                         <h4>
                          name
                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                         </h4>
                         <span>msg.</span>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See all e-Mails</a></li>
            </ul>
          </li>
          <!-- Notifications -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 7 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> note.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> note.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> note.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> note
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> note.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> note
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> note.
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="mdi mdi-message"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 6 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu inner-content-div">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        name
                        <small class="pull-right">30%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 30%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">30% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        name
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-danger" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        name
                        <small class="pull-right">70%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-light-blue" style="width: 70%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">70% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        name
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        name
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        name
                        <small class="pull-right">90%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-primary" style="width: 90%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">90% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
		  <!-- User Account -->
   @endphp
  --}}
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
		 <div class="ulogo">
			 <a href="{{ route('admin') }}">
			  <!-- logo for regular state and mobile devices -->
			  <span><b></b>Admin</span>
			</a>
		</div>
        <div class="image">
          <img src="{{url('/img/avatar.jpg')}}" class="rounded-circle" alt="User Image">
        </div>
        <div class="info">
          <p>Main Admin</p>
        </div>
      </div>


<!-- sidebar menu -->
<ul class="sidebar-menu" data-widget="tree">
	<li class="nav-devider"></li>


  <li class="header nav-small-cap">PERSONAL</li>

    <!-- dashboard menu -->

        <li class="active">
          <a href="{{route('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <!-- vehicle menu -->

        <li class="treeview">

            <a href="#">
              <i class="fa fa-car text-blue"></i>
              <span>Vehicles</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="{{route('bustypes')}}" >Vechile Type</a></li>
              <li><a href="{{route('buses')}}">Buses</a></li>
              <li><a href="{{route('routes')}}">Routes</a></li>          
              <li><a href="{{route('schedules')}}">Schedule</a></li>
              <li><a href="{{route('bookings')}}">Booking</a></li>          
              
            </ul>  
        </li>

<!-- user menu -->
      <li class="treeview">

          <a href="#">
            <i class="fa fa-users text-red"></i>
            <span>Visitors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('travellers')}}" >Travellers</a></li>
            <li><a href="{{route('guests')}}">Guest</a></li>
            <li><a href="{{route('vendors')}}">Vendors</a></li>
          </ul>

      </li>
   

<li class="header nav-small-cap">OTHERS</li>  
    
       <li >
          <a  href="{{route('faq')}}">
            <i class="fa fa-binoculars text-green"></i> <span>FAQ</span>
          </a>
        </li>

         <li class="">
          <a  href="{{route('whyus')}}">
            <i class="fa fa-question text-orange"></i> <span>Why Us</span>
          </a>
        </li>
    <li class="">
          <a  href="{{route('whoweare')}}">
            <i class="fa fa-question text-orange"></i> <span>Who we are</span>
          </a>
        </li>
    <li class="">
          <a  href="{{route('whatweoffer')}}">
            <i class="fa fa-question text-orange"></i> <span>What we offer</span>
          </a>
        </li>

         <li class="">
          <a  href="{{route('testimonials')}}">
            <i class="fa fa-comment text-purple"></i> <span>Testimonials</span>
          </a>
        </li>

         <li class="">
          <a  href="{{route('teams')}}">
            <i class="fa fa-group text-blue"></i> <span>Teams</span>
          </a>
        </li>

        <li class="">
          <a  href="{{route('admins')}}">
            <i class="fa fa-android text-green"></i> <span>Admin</span>
          </a>
        </li>

        <li class="">
          <a  href="{{route('users')}}">
            <i class="fa fa-user text-yellow"></i> <span>User</span>
          </a>
        </li>

<!-- app -->
<!-- <li class="header nav-small-cap">IN TEMPLATE</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>App</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/app/app-chat.html')}}">Chat app</a></li>
            <li><a href="{{ url('/backend/pages/app/project-table.html')}}">Project</a></li>
            <li><a href="{{ url('/backend/pages/app/app-contact.html')}}">Contact / Employee</a></li>
            <li><a href="{{ url('/backend/pages/app/app-ticket.html')}}">Support Ticket</a></li>
			<li><a href="{{ url('/backendpages/app/calendar.html')}}">Calendar</a></li>
            <li><a href="{{ url('/backend/pages/app/profile.html')}}">Profile</a></li>
            <li><a href="{{ url('/backend/pages/app/userlist-grid.html')}}">Userlist Grid</a></li>
			<li><a href="{{ url('/backend/admin/pages/app/userlist.html')}}">Userlist</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/mailbox/mailbox.html')}}">Inbox</a></li>
            <li><a href="{{ url('/backend/pages/mailbox/compose.html')}}">Compose</a></li>
            <li><a href="{{ url('/backend/pages/mailbox/read-mail.html')}}">Read</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/UI/badges.html')}}">Badges</a></li>
            <li><a href="{{ url('/backend/pages/UI/border-utilities.html')}}">Border</a></li>
            <li><a href="{{ url('/backend/pages/UI/buttons.html')}}">Buttons</a></li>
            <li><a href="{{ url('/backend/pages/UI/bootstrap-switch.html')}}">Bootstrap Switch</a></li>
            <li><a href="{{ url('/backend/pages/UI/cards.html')}}">User Card</a></li>
            <li><a href="{{ url('/backend/pages/UI/color-utilities.html')}}">Color</a></li>
			<li><a href="{{ url('/backend/pages/UI/date-paginator.html{')}}l">Date Paginator</a></li>
            <li><a href="{{ url('/backend/pages/UI/dropdown.html')}}">Dropdown</a></li>
            <li><a href="{{ url('pages/UI/dropdown-grid.html')}}">Dropdown Grid</a></li>
            <li><a href="{{url('/backend/pages/UI/general.html')}}">General</a></li>
            <li><a href="{{url('/backend/pages/UI/icons.html')}}">Icons</a></li>
            <li><a href="{{url('/backend/pages/UI/media-advanced.html')}}">Advanced Medias</a></li>
			<li><a href="{{url('/backend/pages/UI/modals.html')}}">Modals</a></li>
            <li><a href="{{url('/backend/pages/UI/nestable.html')}}">Nestable</a></li>
            <li><a href="{{url('/backend/pages/UI/notification.html')}}">Notification</a></li>
            <li><a href="{{url('/backend/pages/UI/portlet-draggable.html')}}">Draggable Portlets</a></li>
            <li><a href="{{url('/backend/pages/UI/ribbons.html')}}">Ribbons</a></li>
            <li><a href="{{url('/backend/UI/sliders.html')}}">Sliders</a></li>
            <li><a href="{{url('/backend/pages/UI/sweatalert.html')}}">Sweet Alert</a></li>
            <li><a href="{{url('/backend/pages/UI/tab.html')}}">Tabs</a></li>
            <li><a href="{{url('/backend/pages/UI/timeline.html')}}">Timeline</a></li>
            <li><a href="{{url('/backend/pages/UI/timeline-horizontal.html')}}">Horizontal Timeline</a></li>			  
          </ul>
        </li>

<li class="header nav-small-cap">FORMS, TABLE & LAYOUTS</li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-bars"></i>
            <span>Widgets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/widgets/chart.html') }}" >Chart</a></li>
            <li><a href="{{ url('/backend/pages/widgets/blog.html')}}">Blog</a></li>
            <li><a href="{{ url('/backend/pages/widgets/list.html')}}">List</a></li>
            <li><a href="{{ url('/backend/pages/widgets/social.html')}}">Social</a></li>
            <li><a href="{{ url('/backend/pages/widgets/statistic.html')}}">Statistic</a></li>
            <li><a href="{{ url('/backend/pages/widgets/tiles.html')}}">Tiles</a></li>
            <li><a href="{{ url('/backend/pages/widgets/weather.html')}}">Weather</a></li>
            <li><a href="{{ url('/backend/pages/widgets/widgets.html')}}">Widgets</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/layout/boxed.html')}}">Boxed</a></li>
            <li><a href="{{ url('/backend/pages/layout/fixed.html')}}">Fixed</a></li>
            <li><a href="{{ url('/backend/pages/layout/collapsed-sidebar.html')}}">Collapsed Sidebar</a></li>
          </ul>
        </li>		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-square-o"></i>
            <span>Box</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/box/advanced.html')}}">Advanced</a></li>
            <li><a href="{{ url('/backend/pages/box/basic.html')}}">Boxed</a></li>
            <li><a href="{{ url('/backend/pages/box/color.html')}}">Color</a></li>
			<li><a href="{{ url('/backend/pages/box/group.html')}}">Group</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/charts/chartjs.html')}}">ChartJS</a></li>
            <li><a href="{{ url('/backend/pages/charts/flot.html')}}">Flot</a></li>
            <li><a href="{{ url('/backend/pages/charts/inline.html')}}">Inline charts</a></li>
            <li><a href="{{ url('/backendpages/charts/morris.html')}}">Morris</a></li>
            <li><a href="{{ url('/backend/pages/charts/peity.html')}}">Peity</a></li>
            <li><a href="{{ url('/backend/pages/charts/chartist.html')}}">Chartist</a></li>
            <li><a href="{{ url('/backend/pages/charts/rickshaw-charts.html')}}">Rickshaw Charts</a></li>
            <li><a href="{{ url('/backend/pages/charts/nvd3-charts.html')}}">NVD3 Charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/forms/advanced.html')}}">Advanced Elements</a></li>
            <li><a href="{{ url('/backend/pages/forms/code-editor.html')}}">Code Editor</a></li>
            <li><a href="{{ url('/backend/pages/forms/editor-markdown.html')}}">Markdown</a></li>
            <li><a href="{{ url('/backend/pages/forms/editors.html')}}">Editors</a></li>
            <li><a href="{{ url('/backend/pages/forms/form-validation.html')}}">Form Validation</a></li>
            <li><a href="{{ url('/backend/pages/forms/form-wizard.html')}}">Form Wizard</a></li>
            <li><a href="{{ url('/backend/pages/forms/general.html')}}">General Elements</a></li>
            <li><a href="{{ url('/backend/pages/forms/mask.html')}}">Formatter</a></li>
            <li><a href="{{ url('/backend/pages/forms/premade.html')}}">Pre-made Forms</a></li>
            <li><a href="{{ url('/backend/pages/forms/xeditable.html')}}">Xeditable Editor</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/tables/simple.html')}}">Simple tables</a></li>
            <li><a href="{{ url('/backend/pages/tables/data.html')}}">Data tables</a></li>
            <li><a href="{{ url('/backend/pages/tables/editable-tables.html')}}">Editable Tables</a></li>
            <li><a href="{{ url('/backend/pages/tables/table-color.html')}}">Table Color</a></li>
          </ul>
        </li>
		<li>
          <a href="{{ url('/backend/pages/email/index.html')}}">
            <i class="fa fa-envelope-open-o"></i> <span>Emails</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
		<li class="header nav-small-cap">EXTRA COMPONENTS</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map"></i> <span>Map</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/map/map-google.html')}}">Google Map</a></li>
            <li><a href="{{ url('/backend/pages/map/map-vector.html')}}">Vector Map</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-plug"></i> <span>Extension</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/extension/fullscreen.html')}}">Fullscreen</a></li>
          </ul>
        </li>        
		<li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Sample Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/backend/pages/samplepage/blank.html')}}">Blank</a></li>
            <li><a href="{{ url('/backend/pages/samplepage/coming-soon.html')}}">Coming Soon</a></li>
            <li><a href="{{ url('/backend/pages/samplepage/custom-scroll.html')}}">Custom Scrolls</a></li>
			<li><a href="{{ url('/backend/pages/samplepage/faq.html')}}">FAQ</a></li>
			<li><a href="{{ url('/backend/pages/samplepage/gallery.html')}}">Gallery</a></li>
			<li><a href="{{ url('/backend/pages/samplepage/invoice.html')}}">Invoice</a></li>
			<li><a href="{{ url('/backend/pages/samplepage/lightbox.html')}}">Lightbox Popup</a></li>
			<li><a href="{{ url('/backend/pages/samplepage/pace.html')}}">Pace</a></li>
			<li><a href="{{ url('/backend/pages/samplepage/pricing.html')}}">Pricing</a></li>

            <li class="treeview">
              <a href="#">Authentication 
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/backend/pages/samplepage/login.html')}}">Login</a></li>
                <li><a href="{{ url('/backend/pages/samplepage/register.html')}}">Register</a></li>
                <li><a href="{{ url('/backend/pages/samplepage/lockscreen.html">')}}Lockscreen</a></li>
                <li><a href="{{ url('/backend/pages/samplepage/user-pass.html')}}">Recover password</a></li>				  
              </ul>
            </li>  

			<li class="treeview">
              <a href="#">Error Pages 
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('/backend/pages/samplepage/404.html')}}">404</a></li>
                <li><a href="{{ url('/backend/pages/samplepage/500.html')}}">500</a></li>
                <li><a href="{{ url('/backend/pages/samplepage/maintenance.html')}}">Maintenance</a></li>		  
              </ul>
            </li> 
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview">
              <a href="#">Level One
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Level Two</a></li>
                <li class="treeview">
                  <a href="#">Level Two
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>        
        
      </ul> -->
    </ul>
  </section>
</aside>

@yield('content')
  
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="{{route('faq')}}">FAQ</a>
		  </li>
		  
		</ul>
    </div>
	  &copy; 2019 <a href="smh.com.np">BTRS</a>. All Rights Reserved. |<span> Developed By:</span><a href="">Piratheesan</a>
  </footer>

 
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 


	<!-- popper -->
	<script src="{{ url('/backend/assets/vendor_components/popper/dist/popper.min.js')}}"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="{{ url('/backend/assets/vendor_components/bootstrap/dist/js/bootstrap.js')}}"></script>
	
	<!-- Morris.js charts -->
	<script src="{{ url('/backend/assets/vendor_components/raphael/raphael.min.js')}}"></script>

	<script src="{{ url('/backend/assets/vendor_components/morris.js/morris.min.js')}}"></script>	
	
	<!-- weather for demo purposes -->
	<script src="{{ url('/backend/assets/vendor_plugins/weather-icons/WeatherIcon.js')}}"></script>
	
	<!-- Sparkline -->
	<script src="{{ url('/backend/assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js')}}"></script>
	
	<!-- daterangepicker -->
	<script src="{{ url('/backend/assets/vendor_components/moment/min/moment.min.js')}}"></script>

	<script src="{{ url('/backend/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	
	<!-- datepicker -->
	<script src="{{ url('/backend/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
	
	<!-- Bootstrap WYSIHTML5 -->
	<script src="{{ url('/backend/assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
	
    <!-- Moments.JS -->
  <script src="{{ url('/backend/assets/vendor_components/moment/moment.js')}}"></script>

	<!-- Slimscroll -->
	<script src="{{ url('/backend/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
	
	<!-- FastClick -->
	<script src="{{ url('/backend/assets/vendor_components/fastclick/lib/fastclick.js')}}"></script>
	
	<!-- peity -->
	<script src="{{ url('/backend/assets/vendor_components/jquery.peity/jquery.peity.js')}}"></script>

   <!-- DataTables -->
      <script src="{{ url('/backend/assets/vendor_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{ url('/backend/assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	
	<!-- Lion_admin App -->
	<script src="{{ url('/backend/js/template.js')}}"></script>
	
	<!-- Lion_admin dashboard demo (This is only for demo purposes) -->
	<script src="{{ url('/backend/js/pages/dashboard.js')}}"></script>
	
	<!-- Lion_admin for demo purposes -->
	<script src="{{ url('/backend/js/demo.js')}}"></script>


  <script src="{{ url('/backend/assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ url('/backend/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ url('/backend/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{ url('/backend/assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js')}}"></script>
  <script src="{{ url('/backend/assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js')}}"></script>
  <script src="{{ url('/backend/assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js')}}"></script>
  <script src="{{ url('/backend/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{ url('/backend/assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js ')}}"></script>
  <script src="{{ url('/backend/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

   <script src="{{ url('/backend/js/pages/data-table.js ')}}"></script>
    <script>
        $(document).ready(function () {
            $('#bussearch').select2();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });


    
    </script>

  <script src="{{ url('/backend/assets/vendor_plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{ url('/ckeditor/ckeditor.js') }}"></script>

<script src="{{ url('/backend/js/custom.js')}}"></script>


	
</body>

</html>
