<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Stand;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return view('vendor.index', ['events'=>Events::latest()->get()],compact('events'));

    }

    public function stands(){
        return view('vendor.stands');
    }
}
