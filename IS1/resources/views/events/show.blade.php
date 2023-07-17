@extends('layout')

@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card p-4">
                <div style="text-align: center;">
                    <p>Name: <b>{{$event->name}}</b></p>
                    <p>Location: <b>{{$event->location}}</b></p>
                    <p>Date: <b>{{$event->date}}</b></p>
                    <p>Description: <b>{{$event->description}}</b></p>
                </div>

                <div style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
                    <a href="{{route('stands.add-stands', ['eventId' => $event->id])}}" id="add-stand-button" class="btn btn-primary btn btn-dark">Add Stands</a>
                </div>

                <img src="/events_photos/{{$event->image}}" class="rounded" width="90%"/>
            </div>  
        </div>
    </div>
</div>

@endsection
