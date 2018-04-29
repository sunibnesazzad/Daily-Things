<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}} - Daily Things</title>
    @include('front.partials.head')
</head>
<body>
    @include('front.partials.header')

    <div class="container" style="min-height: 76vh">
        @yield('content')
    </div>
    @include('front.partials.footer')

    @include('front.partials.scripts')
</body>
</html>