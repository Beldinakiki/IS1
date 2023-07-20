@extends('layout')

@section('content')
    <h1>Stand Details</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h3>Stand Information</h3>
                    
                    <p><strong>Event ID:</strong> {{ $stand->event_id }}</p>
                    <p><strong>Type:</strong> {{ $stand->type }}</p>
                    <p><strong>Size:</strong> {{ $stand->size }}</p>
                    <p><strong>Quantity:</strong> {{ $stand->quantity }}</p>
                    <p><strong>Price:</strong> ${{ $stand->price }}</p>
                    
                    <form method="post" action="{{ route('bookings.create', $stand->id) }}">
    @csrf
    <!-- Add any booking form fields if required -->
    <button type="submit">Book Stand</button>
</form>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Add your custom styles here if needed */
    </style>
@endsection
