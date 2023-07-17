@extends('layout')

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card p-4">
                <div style="text-align: center;">
                    <p>Stand Type"<b>{{$stand->type}}</b></p>
                    <p>Available Quantity :<b>{{$stand->quantity}}</b></p>
                    <p>Price: <b>{{$stand->price}}</b></p>
                </div>

            </div>  
        </div>
    </div>
</div>

@endsection
