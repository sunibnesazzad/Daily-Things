<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{!! App\BaseSettings\Settings::$company_name !!}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{!! route('home') !!}">Home <span class="sr-only"></span></a></li>
                <li class=""><a href="#">Contact Us <span class="sr-only"></span></a></li>
                <li class=""><a href="#">About <span class="sr-only"></span></a></li>
                <li class=""><a href="/category">Category <span class="sr-only"></span></a></li>
                <li class=""><a href="/item">Item <span class="sr-only"></span></a></li>
                @role('admin')
                <li class=""><a href="{{ route('dashboard.main') }}">Dashboard <span class="sr-only"></span></a></li>
                @endrole
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li><a href="{!! route('logout') !!}">Sign Out</a></li>
                @else
                    <li><a href="/register">Sign Up</a></li>
                    <li><a href="{!! route('login') !!}">Sign In</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>