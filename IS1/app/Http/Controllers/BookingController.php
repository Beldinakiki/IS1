<?php

namespace App\Http\Controllers;
use App\Models\Stand;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;



class BookingController extends Controller
{
    public function create(Stand $stand)
    {
        return view('bookings.create', compact('stand'));
    }
    public function store(Request $request)
{
    $request->validate([
        'quantity' => 'required|integer|min:1|max:' . Stand::findOrFail($request->stand_id)->quantity,
    ]);

    $booking = Booking::create([
        'quantity' => $request->quantity,
        'stand_id' => $request->stand_id,
        'user_id' => auth()->user()->id,
        'date' => $request->date,
        'down_payment' => $request->down_payment,
    ]);

    // Decrease the stand quantity after booking
    $stand = Stand::findOrFail($request->stand_id);
    $stand->decrement('quantity', $request->quantity);

    return redirect()->route('bookings.show', $booking->id)
        ->with('success', 'Stand booked successfully!');
}

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function download($id)
{
    $booking = Booking::findOrFail($id);

    $pdf = new Dompdf();
    $pdf->loadHtml(view('bookings.show', compact('booking'))->render());
    $pdf->setPaper('A4', 'portrait'); // Set paper size and orientation (optional)

    // Render the PDF content
    $pdf->render();

    // Generate a filename for the downloaded PDF
    $filename = 'booking_details_' . $booking->id . '.pdf';

    // Download the PDF
    return $pdf->stream($filename);
}
}