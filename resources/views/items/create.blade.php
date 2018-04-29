@extends('front.layouts.default')

@section('content')

    <h2 class="text-center">Add Items</h2>
    <br><br>

<div class="well">
    <form class="form-horizontal" action="/item/store" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="Name">Name :</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <br>
        <div class="form-group">
            <label for="pwd">Price :</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <br>
        <div class="form-group">
            <label for="Name">Category :</label>
            <select class="form-control" id="category" name="category">
                @foreach($categorys as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Name">Quantity :</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <br>
        <div class="form-group">
            <label for="pwd">Unit :</label>
            <input type="text" class="form-control" id="unit" value="Kg" name="unit" disabled>
        </div>
        <br>
        <div class="form-group">
            <label for="Name">Purchase Date :</label>
            <input type="datetime-local" name="purchase_date" required>
        </div>
        <br>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>


@endsection