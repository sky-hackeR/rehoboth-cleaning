<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display a specific service page based on the slug.
     */
    public function service(Service $service): View
    {
        // $service is automatically resolved by Laravel's Route Model Binding
        return view('pages.service-detail', [
            'service' => $service,
            'relatedServices' => Service::where('id', '!=', $service->id)->take(3)->get()
        ]);
    }
}