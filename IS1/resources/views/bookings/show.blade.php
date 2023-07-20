
@extends('layout')

@section('content')
<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .booking-details {
        max-width: 400px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .booking-details p {
        margin-bottom: 10px;
    }

    .booking-details a {
        color: #007bff;
        text-decoration: none;
    }

.booking-details a:hover {
    text-decoration: underline;
}
</style>
<div class="container">
    <h1>Booking Details</h1>

    <div class="booking-details">
        <p>Stand: {{ $booking->stand->type }}</p>
        <p>Stand ID: {{ $booking->stand->id}}</p>
        <p>Quantity: {{ $booking->quantity }}</p>
        <p>Date: {{ $booking->date }}</p>
        <p>Payment: {{ $booking->down_payment }}</p>
        

        <a href="{{ route('stands.show', $booking->stand->id) }}">Back to Stand</a>
        <a href="{{ route('bookings.download', $booking->id) }}" target="_blank">Download Invoice PDF</a>
    </div>
</div>
@endsection
