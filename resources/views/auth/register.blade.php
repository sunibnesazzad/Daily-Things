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
    <title>Register</title>
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
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<body class=" login">
<div id="particle"></div>
<!-- BEGIN LOGO -->
<div class="logo overlay">
    {{--<a href="index.html">
        <img src="../assets/pages/img/logo-big.png" alt=""/> </a>--}}
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content overlay">
    <!-- END LOGIN FORM -->
    <form action="{!! route('web.do.register') !!}" method="POST">
        {!! csrf_field() !!}
        <h3 class="font-green">Sign Up</h3>
        <p class="hint"> Enter your account details below: </p>

        <div class="form-group">
            <label for="name" class="control-label visible-ie8 visible-ie9">Name</label>
            <input type="text" name="name" class="form-control form-control-solid placeholder-no-fix" value="{!! old('name') !!}" placeholder="Username"  required/>
        </div>


        <div class="form-group">
            <label for="email" class="control-label visible-ie8 visible-ie9">E-Mail</label>
            <input type="text" name="email" class="form-control form-control-solid placeholder-no-fix" value="{!! old('email') !!}" placeholder="Email-Address"   required/>
        </div>


        <div class="form-group">
            <label for="password" class="control-label visible-ie8 visible-ie9">Password</label>
            <input type="password" name="password" class="form-control form-control-solid placeholder-no-fix" placeholder="Password" autocomplete="off"  required/>
        </div>


        <div class="form-group">
            <label for="password_confirmation" class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
            <input type="password" name="password_confirmation" class="form-control form-control-solid placeholder-no-fix" placeholder="Re-type Your Password" autocomplete="off"  required/>
        </div>

        {{--<div class="form-group margin-top-20 margin-bottom-20">
            <label class="mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="tnc"/> I agree to the
                <a href="javascript:;">Terms of Service </a> &
                <a href="javascript:;">Privacy Policy </a>
                <span></span>
            </label>
            <div id="register_tnc_error"></div>
        </div>--}}
        <div class="form-actions">
            <a href="{!! route('login') !!}" class="btn green btn-outline">Back</a>
            {{--<button type="button" id="register-back-btn" class="btn green btn-outline">Back</button>--}}
            <input type="submit" name="submit" class="btn btn-success uppercase pull-right" value="Register"/>
            {{--<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>--}}
        </div>
    </form>

</div>
<div class="copyright"> {!! date('Y') !!} © {!! \App\BaseSettings\Settings::$company_name !!} </div>

<script src="{!! asset('assets/global/plugins/jquery.min.js') !!}" type="text/javascript"></script>
<<<<<<< HEAD
=======
<script src="{!! asset('assets/global/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>
>>>>>>> release/style-fix
<script src="{!! asset('assets/particles/particles.min.js') !!}"></script>
<script>
    particlesJS.load('particle', '../assets/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>
<!-- END CORE PLUGINS -->
@include('partials.toastr')
</body>

</html>