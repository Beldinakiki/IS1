@extends('layout')

@section('content')
    <h1>Book Stand</h1>

   
    <form action="{{ route('bookings.process') }}" method="post">
        @csrf
        <input type="hidden" name="stand_id" value="{{ $stand->id }}">

      
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity"   min="1"required>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required>

        <label for="down_payment">Down Payment:</label>
        <input type="number" name="down_payment" id="down_payment" min="2000" required>
        

        <button type="submit">Book Stand</button>
    </form>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@endsection
