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
                    {{--<div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                            <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                        </div>
                    </div>--}}
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <a href="{!! route('category.create') !!}" id="sample_editable_1_new" class="btn sbold green"> Add New
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{--<div class="btn-group pull-right">
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
                                </div>--}}
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
                                            <a href="category/update/{!!  $category->id !!}">
                                                <i class="fa fa-edit"></i> Edit </a>
                                        </li>
                                        {{--<li>
                                            <a href="category/delete/{!!  $category->id !!}">
                                                <i class="icon-dislike"></i> Delete </a>
                                        </li>--}}
                                        <li>
                                            <a  href="#" data-toggle="modal" data-target="#deleteConfirm" deleteUrl="{{ route('category.delete', $category->id) }}">
                                                <i class="fa fa-trash"></i> Delete </a>
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
    {{--conformation modal--}}
    <div  class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    <form class="deleteForm" method="POST" action="/" accept-charset="UTF-8">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        <input class="btn btn-primary" type="submit" value="Yes, Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('styles')
    <link rel="stylesheet" href="{!! asset('assets/global/plugins/select2/css/select2.min.css') !!}">
    <style>
        .modal .modal-dialog { width: 65%; }
    </style>
@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('assets/global/plugins/select2/js/select2.full.min.js') !!}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            //start of delete action
            $(document).on("click", ".deleteBtn", function() {
                var deleteUrl = $(this).attr('deleteUrl');
                console.log(deleteUrl);
                $(".deleteForm").attr("action", deleteUrl);
            });
            //end of delete action

            //select2
            $('.status').select2({
                width: '100%',
                theme: "classic"
            });

        });
    </script>


@endsection
