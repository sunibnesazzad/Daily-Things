{{--@extends('front.layouts.default')

@section('content')

    <h2 class="text-center">Categories</h2>
    <br>
    <div class="text-center">
        <table style="width:80%" class="text-center">
            <tr class="text-center">
                <th>ID</th>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach($categorys as $category)
                <tr class="text-center">
                    <td>{!! $category->id !!}</td>
                    <td>{!! $category->name !!}</td>
                    <td><a href="" class="btn btn-success">Edit</a></td>
                    <td><a href="/category/delete/{{$category->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection--}}

@extends('layouts.app')

@section('content')
    <!-- BEGIN PAGE TITLE-->
    <h1 align="center">
        All Categories
    </h1>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Category Inventory</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="category/create" id="sample_editable_1_new" class="btn sbold green"> Add New
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-print"></i> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="items">
                        <thead>
                        <tr>
                            <th>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                            <span></span>
                            </label>
                            </th>
                            <th>ID</th>
                            <th>Name</th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categorys as $category)
                        <tr class="odd gradeX">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="checkboxes" value="1" />
                                    <span></span>
                                </label>
                            </td>
                            <td>{!! $category->id !!}</td>
                            <td>{!! $category->name !!}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="icon-docs"></i> Detail </a>
                                        </li>
                                        <li>
                                            <a href="category/update/{!!  $category->id !!}">
                                                <i class="icon-tag"></i> Update </a>
                                        </li>
                                        <li>
                                            <a href="category/delete/{!!  $category->id !!}">
                                                <i class="icon-user"></i> Delete </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>


    {{-- Datatables script--}}


@endsection
