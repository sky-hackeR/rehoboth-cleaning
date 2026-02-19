<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\View\View;

class LocationController extends Controller
{
    /**
     * Display the directory of all Canadian service areas.
     */
    public function index(): View
    {
        $locations = Location::all()->groupBy('state'); // Groups by Province (ON, BC, AB)
        return view('locations.index', compact('locations'));
    }

    /**
     * Show details for a specific city hub.
     */
    public function show(Location $location): View
    {
        return view('locations.show', compact('location'));
    }
}