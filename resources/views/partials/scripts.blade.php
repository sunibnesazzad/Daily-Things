<!-- BEGIN CORE PLUGINS -->
<script type="text/javascript" src="{!! asset('assets/global/plugins/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/js.cookie.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/jquery.blockui.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{!! asset('assets/global/scripts/datatable.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/datatables/datatables.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->

<script type="text/javascript" src="{!! asset('assets/global/plugins/respond.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/excanvas.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/ie8.fix.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/jquery.sparkline.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/toastr/toastr.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/scripts/app.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/pages/scripts/profile.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/layouts/layout/scripts/layout.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/layouts/layout/scripts/demo.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/layouts/global/scripts/quick-sidebar.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/layouts/global/scripts/quick-nav.min.js') !!}"></script>

<script>
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
<!-- Google Code for Universal Analytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../../../../www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-37564768-1', 'auto');
    ga('send', 'pageview');
</script>
<!-- End -->

@include('partials.toastr')
@yield('scripts')