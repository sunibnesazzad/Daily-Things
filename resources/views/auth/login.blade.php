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
    <title>Login</title>
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

    <!-- BEGIN LOGIN FORM -->

    <form action="{!! route('web.do.login') !!}" method="POST" id="login-form">
        {!! csrf_field() !!}
        <h3 class="form-title font-green">Sign In to {!! \App\BaseSettings\Settings::$company_name !!}</h3>
        <div class="form-group">
            <label for="email" class="control-label"></label>
            <input type="text" name="email" class="form-control form-control-solid" value="{!! old('email') !!}" placeholder="Email-Address"  required/>
        </div>
        <div class="form-group">
            <label for="password" class="control-label visible-ie8 visible-ie9">Password</label>
            <input type="password" name="password" value="{!! old('password') !!}" class="form-control form-control-solid placeholder-no-fix" placeholder="Password" required/>
        </div>
        <div class="form-actions">
            <input type="submit" name="submit" class="btn green uppercase" value="Login"/>
            <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
        </div>
        {{--<div class="create-account">--}}
        {{--<p>--}}
        {{--<a href="{!! route('web.register') !!}" id="register-btn" class="uppercase">Create an account</a>--}}
        {{--</p>--}}
        {{--</div>--}}
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="{{ route('password.email') }}" method="POST">
        {{ csrf_field() }}
        <h3 class="font-green">Forget Password ?</h3>
        <p> Enter your e-mail address below to reset your password. </p>
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" required> </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
            <button type="submit" class="btn btn-success uppercase pull-right">Send Password Reset Link</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
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
    jQuery("#forget-password").click(function() {
        jQuery("#login-form").hide();
        jQuery(".forget-form").show();
    });
    jQuery("#back-btn").click(function() {
        jQuery("#login-form").show();
        jQuery(".forget-form").hide();
    });

</script>
<!-- END CORE PLUGINS -->
@include('partials.toastr')
</body>

</html>