@extends('layouts.app')
@section('content')

    {{ Breadcrumbs::render(Route::currentRouteName()) }}
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> New User Profile | Account
        {{--<small>user account page</small>--}}
        <div class="btn-group pull-right">
            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="#">
                        <i class="icon-bell"></i> Action</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-shield"></i> Another action</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-user"></i> Something else here</a>
                </li>
                <li class="divider"> </li>
                <li>
                    <a href="#">
                        <i class="icon-bag"></i> Separated link</a>
                </li>
            </ul>
        </div>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        @if(isset($user->userInfo->photo))
                            <img src="{{asset($user->userInfo->photo)}}" class="img-responsive" alt=""> </div>
                        @else
                            <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt=""> </div>
                        @endif
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$user->name}} </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                   
                </div>
                <!-- END PORTLET MAIN -->
                
            </div>
            
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li>
                                        <a href="{!! route('profile') !!}">Personal Info</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('profile.pic.change') !!}">Change Avatar</a>
                                    </li>
                                    <li class="active">
                                        <a href="{!! route('profile.password.reset') !!}">Change Password</a>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active">
                                        <form action="{!! route('password.doReset') !!}" method="POST" class="horizontal-form" role="form">
                                            {!! csrf_field() !!}
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="password" class="control-label">Password</label>
                                                        <input type="password" name="password"
                                                               class="form-control form-control-solid placeholder-no-fix"
                                                               placeholder="Password" autocomplete="off" required/>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="password_confirmation" class="control-label">Re-type Your
                                                            Password</label>
                                                        <input type="password" name="password_confirmation"
                                                               class="form-control form-control-solid placeholder-no-fix"
                                                               placeholder="Re-type Your Password" autocomplete="off" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-body">
                                            <input type="submit" name="submit" class="btn btn-primary control-label" value="Submit"/>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
@endsection

@section('styles')
@endsection
@section('scripts')

@endsection