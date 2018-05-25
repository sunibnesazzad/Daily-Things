@extends('layouts.app')

@section('content')
    <h1 align="center">
        Update Category
    </h1>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bubble font-green"></i>
                        <span class="caption-subject font-green bold uppercase">Validation Using Icons</span>
                    </div>
                   {{-- <div class="actions">
                        <div class="btn-group">
                            <a class="btn green btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;"> Option 1</a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="javascript:;">Option 2</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Option 3</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Option 4</a>
                                </li>
                            </ul>
                        </div>
                    </div>--}}
                </div>
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="/category/edit/{{ $category->id }}" method="POST" id="form_sample_2" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                            <div class="form-group  margin-top-20">
                                <label class="control-label col-md-3"> Category Name
                                    <span class="required"> : </span>
                                </label>
                                <div class="col-md-4">
                                    <div class="input-icon right">
                                        <i class="fa"></i>
                                        <input type="text" class="form-control" name="name" value="{{$category->name}}" required/> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Update</button>
                                    {{--<button type="button" class="btn default">Cancel</button>--}}
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>

@endsection

