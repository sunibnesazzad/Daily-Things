<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>@if(isset($title)) {!! $title.' - ' !!} @endif {!! \App\BaseSettings\Settings::$company_name !!}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="" name="author" />
    @include('partials.styles')

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-5517166-10', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<!-- END HEAD -->