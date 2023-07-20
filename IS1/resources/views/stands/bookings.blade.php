
@extends('layout')

@section('content')
    <h1>Booking Stands</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                @foreach($bookings as $booking)
                    <div class="card mt-3 p-3">
                        <h2>Stand ID: {{ $booking->stand_id }}</h2>
                        <p>Quantity: {{ $booking->quantity }}</p>
                        <p>Date: {{ $booking->date }}</p>
                        <p>Down Payment: {{ $booking->down_payment }}</p>
                        <!-- Add a link to view the invoice -->
                        <a href="{{ route('stands.invoice', $booking->id) }}" class="btn btn-primary">View Invoice</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
