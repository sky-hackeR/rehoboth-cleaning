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
        $otherLocations = Location::where('id', '!=', $location->id)->get();
        $configContent = config("location.content.{$location->slug}")?: config('location.content.default', []);
        $contentTitle = data_get($configContent, 'title', 'Cleaning Services');
        $contentBody  = data_get($configContent, 'body', '');
        return view('locations.show', [
            'location' => $location,
            'otherLocations' => $otherLocations,
            'contentTitle' => $contentTitle,
            'contentBody' => $contentBody,
        ]);
    }
}