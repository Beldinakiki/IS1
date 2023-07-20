@extends('layout')

@section('content')
    <div class="container">
        <div class="text-right">
            <a href="events/create" class="btn btn-dark mt-2"> New Event </a>
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
        <td><a href="events/{{$event->id}}/show" class="text-dark">{{$event->name}}</a></td>
        <td>{{$event->location}}</td>
        <td>{{$event->date}}</td>
        <td>{{$event->description}}</td>
        <td>
          <img src="events_photos/{{ $event->image}}" class="rounded-circle" width="100" height="100" />
        </td>
        <td>
          <a href="events/{{ $event->id }}/stands/create" class="btn btn-dark btn-sm">Add Stands</a> </td>
        <td>
          <a href="events/{{ $event->id }}/edit" class="btn btn-dark btn-sm">Edit Event</a> </td>
          <td>
          <form method ="POST" class="d-inline" action="/events/{{ $event->id }}/soft-delete" >
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Delete Event</button>
</form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

    </div>
@endsection