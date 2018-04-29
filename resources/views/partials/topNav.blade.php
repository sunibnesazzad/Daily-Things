<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            {{--<h3 style="color: #f6f9fc">Admin Panel</h3>--}}
            {{--<a href="#">--}}
                {{--<img src="../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default img-responsive" style="height: 45px; margin-top: 3px;" />--}}
            {{--</a>--}}
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
            {{--<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                    <span class="badge badge-default"> 7 </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="external">
                        <h3>
                            <span class="bold">12 pending</span> notifications</h3>
                        <a href="page_user_profile_1.html">view all</a>
                    </li>
                    <li>
                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                            <li>
                                <a href="javascript:;">
                                    <span class="time">just now</span>
                                    <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> New user registered. </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>--}}
            <!-- END NOTIFICATION DROPDOWN -->

                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true">
                        <span class="username username-hide-on-mobile"> Settings </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{!! route('profile') !!}">
                                <i class="icon-user"></i>My Profile </a>
                        </li>

                        <li>
                            <a href="{!! route('profile.password.reset') !!}">
                                <i class="icon-key"></i> Password Reset </a>
                        </li>

                    </ul>
                </li>
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="{!! route('logout') !!}" class="dropdown-toggle">
                        <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->