<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
@include('partials.head')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
<div class="page-wrapper">
    @include('partials.topNav')
    <div class="clearfix"> </div>
    <div class="page-container">
        @include('partials.sideBar')
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    @include('partials.footer')
</div>

@include('partials.scripts')
</body>

</html>