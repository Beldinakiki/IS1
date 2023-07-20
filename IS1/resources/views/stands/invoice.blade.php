
@extends('layout')

@section('content')
    <h1>Invoice</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <h2>Stand ID: {{ $booking->stand_id }}</h2>
                    <p>User ID: {{ $booking->user_id }}</p>
                    <p>Quantity: {{ $booking->quantity }}</p>
                    <p>Date: {{ $booking->date }}</p>
                    <p>Down Payment: {{ $booking->down_payment }}</p>
                   
                    
                    <a href="{{ route('bookings.downloadInvoice', ['booking' => $booking]) }}">Download Invoice</a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
@endsection
