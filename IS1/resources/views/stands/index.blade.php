@extends('layout')

@section('content')
<style>
    /* CSS to center the content */
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .stand-card {
        width: 400px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .stand-name {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .stand-description {
        margin-bottom: 20px;
    }

    .view-details-link {
        color: blue;
        text-decoration: underline;
    }

    .view-details-link:hover {
        color: darkblue;
    }
</style>

<div class="container">
    <h1>Stands</h1>

    <div class="row justify-content-center">
       
            <div class="card mt-3 p-3">
                @foreach($stands as $stand)
                <div class="stand-card">
                    <h2 class="stand-name">{{ $stand->name }}</h2>
                    <p class="stand-description">{{ $stand->description }}</p>
                    <p>Event: {{ $stand->event->name }}</p>
                    <a class="view-details-link" href="{{ route('stands.show', $stand->id) }}">View Details</a>
                    
                </div>
                @endforeach
            </div>
        
    </div>
</div>
@endsection
