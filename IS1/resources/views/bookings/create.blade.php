@extends('layout')

@section('content')
    <h1>Book Stand - {{ $stand->type}}</h1>

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" max="{{ $stand->quantity }}" required>
        </div>
        <div class="form-group">
        <label for="date">Date:</label>
          <input type="date" name="date" id="date" min="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="down_payment">Down Payment:</label>
            <input type="number" name="down_payment" id="down_payment" min="2000" required>
        </div>
        <input type="hidden" name="stand_id" value="{{ $stand->id }}">
        <button type="submit">Book Stand</button>
    </form>
@endsection
