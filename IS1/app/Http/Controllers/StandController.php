<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Stand;
use App\Models\Booking;

use Illuminate\Http\Request;

class StandController extends Controller
{ 
  // StandController.php

// StandController.php
public function index()
{
    $stands = Stand::all(); // Retrieve all stands from the database
    return view('stands.index', compact('stands'));
}

public function create($eventId)
{
    // Fetch the event from the database
    $event = Events::findOrFail($eventId);

    // Pass the $event data and $eventId variable to the view
    return view('stands.create', compact('event', 'eventId'));
}

    
   
        
    public function store(Request $request, $eventId)
    {
       
        $request->validate([
            'size' => 'required',
            'size' => 'required|in:small,medium,large',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        // Create the stand
        $stand = new Stand([
            'type' => $request->type, 
            'size' => $request->size,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'event_id' => $eventId,
        ]);

        // Save the stand and associate it with the event
        //$event->stands()->save($stand);
        $stand->save();
 
        return redirect()->route('stands.show', ['id' => $stand->id])->with('success', 'Stand Successfully Created!');
    }
    
    public function show($id)
    {
        $stand = Stand::findOrFail($id);
        return view('stands.show', ['stand' => $stand]);
    }
   
    
}
