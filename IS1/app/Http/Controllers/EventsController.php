<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\Stand;
use Illuminate\Database\Eloquent\SoftDeletes;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::get();
        return view('events.index',
        ['events'=>Events::latest()->get()
    ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $request->validate([
            'name'=>'required',
            'location'=>'required',
            'date'=>'required',
            'description'=> 'required',
            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        // uploading the image
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('events_photos'),$imageName);

        $event = new Events;
        $event->image = $imageName;
        $event->name = $request->name;
        $event->location= $request->location;
        $event->date= $request->date;
        $event->description= $request->description;

        $event->save();

        return back()->withSuccess('Event Successfully Created!!');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    $event = Events::where('id', $id)->first();
    return view('events.show', ['event' => $event]);


    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    { 
        $event = Events::where('id',$id)->first();
        return view('events.edit',['event'=> $event]);

        return back()->withSuccess('Event Successfully Edited!!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
    'name' => 'required',
    'location' => 'required',
    'date' => 'required',
    'description' => 'required',
    'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
]);

$event = Events::where('id', $id)->first();

if ($request->hasFile('image') && $request->file('image')->isValid()) {
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('events_photos'), $imageName);
    $event->image = $imageName;
}

$event->name = $request->name;
$event->location = $request->location;
$event->date = $request->date;
$event->description = $request->description;

$event->save();

return back()->withSuccess('Event Successfully Updated!!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        $event = Events::findOrFail($id);
    
        // Soft delete the event
        $event->delete();
    
        return redirect()->back()->with('success', 'Event Successfully Deleted!');
    }
   
   
    
}