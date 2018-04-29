@extends('front.layouts.default')

@section('content')

    <h2 class="text-center">Items</h2>
    <br><br>
    <a href="/item/create" class="btn btn-success">Create Items</a>
    <br><br>
    <div class="text-center">
        <table style="width:100%" class="text-center">
            <tr class="text-center">
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Date of Purchase</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach($items as $item)
                <tr class="text-center">
                    <td>{!! $item->id !!}</td>
                    <td>{!! $item->name !!}</td>
                    <td>{!! $item->category->name !!}</td>
                    <td>{!! $item->price !!}</td>
                    <td>{!! $item->quantity !!}</td>
                    <td>{!! $item->unit !!}</td>
                    <td>{!! $item->date_of_purchase !!}</td>
                    <td><a href="/item/update/{{$item->id}}" class="btn btn-success">Edit</a></td>
                    <td><a href="/item/delete/{{$item->id}}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection