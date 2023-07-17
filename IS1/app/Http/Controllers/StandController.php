<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Stand;

use Illuminate\Http\Request;

class StandController extends Controller
{ 
    public function create(Request $request)
    {
        $data = $request->validate([
            'size' => 'required|in:small,medium,large',
            'quantity' => 'required|integer|between:1,100',
            'date' => 'required|date_format:Y-m-d',
            'eventId' => 'required|integer',
        ]);
        
      
          $stand = Stand::create($data);
          $stand->event()->associate($request->input('eventId'));
          $stand->save();
      
          if ($stand) {
            return redirect()->route('events.stands')->with('success', 'Stand created successfully.');
          } else {
            return redirect()->route('stands.create')->with('error', 'An error occurred.');
          }
        }
    
    
    
    public function store(Request $request,$eventId ){

        $event = Events::findOrFail($eventId);
        
            //validate data
            $request->validate([
                'size'=>'required',
                'quantity'=>'required',
                'price'=>'required',
            ]);

                        
                $stand = new Stand();
                $stand->type = $request->type;
                $stand->size = $request->size;
                $stand->price = $request->price;

                $stand->save();

                           
                $stand->eventId = $event->id;

               
                $stand->save();


                return redirect()->route('events.showstands', ['id' => $eventId])->with('success', 'Stands Added!');    
    }
    
    public function show($id)
    {

    $event = Events::where('id', $id)->first();
    return view('events.showstands', ['event' => $event]);


    }
    
   


    
}
