<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" type="text/css"
          href="{{url('/backend/assets/vendor_components/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/backend/assets/vendor_components/Ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/backend/assets/vendor_components/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/backend/assets/vendor_components/linea-icons/linea.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/backend/assets/vendor_components/glyphicons/glyphicon.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/backend/assets/vendor_components/flag-icon/css/flag-icon.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/backend/assets/vendor_components/material-design-iconic-font/css/materialdesignicons.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/backend/assets/vendor_components/simple-line-icons-master/css/simple-line-icons.css')}}">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{ url('/backend/assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}">
    <link href="{{ url('/backends/css/login.css') }}" rel="stylesheet">
    <link href="{{ url('/backends/css/style-responsive.css') }}" rel="stylesheet">

    {{--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
    <![endif]-->
</head>

<body>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->

<div id="login-page">
    <div class="container">
        <section class="logo">
            <div class="row" align="center">
                <div class="col-md-12">
                    <img class="login-logo" src="{{ url('/img/avatar.jpg') }}" height="60px">
                </div>
            </div>
        </section>

        <form action="{{ route('login') }}" class="form-login" method="POST">
            {{ csrf_field() }}
            <h2 class="form-login-heading">Login now</h2>
            @if(session()->has('error'))
                <div class="alert alert-danger" role="alert" align="center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{session()->get('error')}}</strong>
                </div>
            @endif

            <div class="login-wrap">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
                           placeholder="Email" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                           required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>

                <label class="checkbox " style="margin-left:15px;">
                     <span class="pull-left">
		                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me

		                </span>
                    <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Your Password?</a>

		                </span>

                </label>
                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> LOGIN</button>
            </div>
        </form>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
             class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off"
                               class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-danger" type="button">Cancel</button>
                        <button class="btn btn-success" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </div>
</div>

<!-- jQuery 3 -->
<script src="{{ url('/backend/assets/vendor_components/jquery/dist/jquery.js')}}"></script>

<!-- popper -->
<script src="{{ url('/backend/assets/vendor_components/popper/dist/popper.min.js')}}"></script>

<!-- Bootstrap 4.0-->
<script src="{{ url('/backend/assets/vendor_components/bootstrap/dist/js/bootstrap.js')}}"></script>


</body>
</html>

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--<div class="row justify-content-center">--}}
{{--<div class="col-md-8">--}}
{{--<div class="card">--}}
{{--<div class="card-header">Login</div>--}}

{{--<div class="card-body">--}}
{{--<form method="POST" action="{{ route('login') }}">--}}
{{--@csrf--}}

{{--<div class="form-group row">--}}
{{--<label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}

{{--@if ($errors->has('email'))--}}
{{--<span class="invalid-feedback">--}}
{{--<strong>{{ $errors->first('email') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>--}}

{{--<div class="col-md-6">--}}
{{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

{{--@if ($errors->has('password'))--}}
{{--<span class="invalid-feedback">--}}
{{--<strong>{{ $errors->first('password') }}</strong>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row">--}}
{{--<div class="col-md-6 offset-md-4">--}}
{{--<div class="checkbox">--}}
{{--<label>--}}
{{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
{{--</label>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="form-group row mb-0">--}}
{{--<div class="col-md-8 offset-md-4">--}}
{{--<button type="submit" class="btn btn-primary">--}}
{{--Login--}}
{{--</button>--}}

{{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--Forgot Your Password?--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}


<script>
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>