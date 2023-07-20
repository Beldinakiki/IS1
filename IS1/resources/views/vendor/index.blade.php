@extends('layout')

@section('content')
    <div class="container">
        <div class="text-right">
           
        </div>
       <h1>EVENTS</h1>

       <table class="table table-striped">
    <thead>
      <tr>
        <th>EventN0.</th>
        <th>EventName</th>
        <th>Location</th>
        <th>Date</th>
        <th>Description</th>
      
        
      </tr>
    </thead>
    <tbody>
      @foreach($events as $event)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$event->name}}</td>
        <td>{{$event->location}}</td>
        <td>{{$event->date}}</td>
        <td>{{$event->description}}</td>
        <td>
        <img src="{{ asset('events_photos/' . $event->image) }}" class="rounded-circle" width="100" height="100" />
        </td>
       
        
        <td>
          <a href="/stands" class="btn btn-dark btn-sm">View stands</a> </td>
        
      @endforeach
    </tbody>
  </table>

    </div>
@endsection