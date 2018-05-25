@extends('layouts.app')

@section('content')
    <h1 align="center">
        Add New Category
    </h1>
    <div class="row">
        <div class="col-md-12">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="/category/store" method="POST" id="form_sample_2" class="form-horizontal">
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
                                        <input type="text" class="form-control" name="name" required/> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Create</button>
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

