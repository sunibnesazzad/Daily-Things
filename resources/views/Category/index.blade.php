@extends('front.layouts.default')

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

@endsection