<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title>Reset</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{!! asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! asset('assets/global/plugins/toastr/toastr.min.css') !!}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{!! asset('assets/global/css/components.min.css') !!}" rel="stylesheet" id="style_components" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{!! asset('assets/pages/css/login.min.css') !!}" rel="stylesheet" type="text/css"/>
    <style>
        #particle {
            background-color: #000000;
            position:fixed;
            top:0;
            right:0;
            bottom:0;
            left:0;
            z-index:0;
        }
        .overlay {
            position: relative;
        }
    </style>
</head>
<!-- END HEAD -->

<body class="login">
<div id="particle"></div>
<!-- BEGIN LOGO -->
<div class="logo overlay">
    {{--<a href="index.html">
        <img src="../assets/pages/img/logo-big.png" alt=""/> </a>--}}
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content overlay">

    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}
        <h3 class="form-title font-green">Password Reset || {!! \App\BaseSettings\Settings::$company_name !!}</h3>
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-8">
                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-8">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-8">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Reset Password
                </button>
            </div>
        </div>
    </form>

</div>
<div class="copyright"> {!! date('Y') !!} © {!! \App\BaseSettings\Settings::$company_name !!} </div>

<script src="{!! asset('assets/global/plugins/jquery.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/particles/particles.min.js') !!}"></script>
{{--<script src="{!! asset('assets/pages/scripts/login.min.js') !!}" type="text/javascript"></script>--}}
<script>
    particlesJS.load('particle', '../assets/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>
<!-- END CORE PLUGINS -->
@include('partials.toastr')
</body>

</html>
