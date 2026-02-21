@extends('layouts.app')

@section('content')
    @php
        $top = config('location.top_section', []);
        $title = $top['title'] ?? 'Locations We Serve';
        $subtitle = $top['subtitle'] ?? 'Enjoy a spotless space with our expert cleaning team. Affordable, eco-friendly, and tailored to your needs!';
        $image = $top['image'] ?? 'images/misc/6.webp';
        $decorImage = $top['decor_image'] ?? 'images/deco/s1.webp';
        $locations = \App\Models\Location::all();
        $fallback = config('location.fallback', []);
    @endphp

    <div class="no-bottom" id="content">

        <div id="top"></div>

        <!-- HERO SECTION -->
        <section class="bg-color-3 section-dark text-light pb-0 relative overflow-hidden">
            <img src="{{ asset($decorImage) }}"
                class="w-5 mt-min-60 abs start-10 bottom-10 wow scaleOut"
                alt="">

            <div id="shine-wrapper">
                <div class="template shine"></div>
            </div>

            <div class="container relative z-1000">
                <div class="row g-3 align-items-center">

                    <div class="col-lg-6">
                        <div class="relative z-1000">
                            <h1 class="wow fadeInUp mb-2" data-wow-delay=".2s">
                                {{ $title }}
                            </h1>

                            <p class="lead col-lg-10 mb-0 wow fadeInUp"
                            data-wow-delay=".4s">
                                {{ $subtitle }}
                            </p>

                            <div class="spacer-single"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <img src="{{ asset($image) }}"
                            class="w-100"
                            data-0="transform: translateY(0px);"
                            data-500="transform: translateY(300px);"
                            alt="">
                    </div>

                </div>
            </div>
        </section>

        <!-- LOCATION GRID -->
        <section>
            <div class="container">
                <div class="row g-4">

                    @php
                        $displayLocations = $locations->isEmpty()
                            ? collect($fallback)
                            : $locations;
                    @endphp

                    @foreach($displayLocations as $loc)

                        @php
                            if (is_array($loc)) {
                                $loc = (object) $loc;
                            }

                            $city = $loc->city ?? 'Unknown City';
                            $state = $loc->state ?? $loc->country ?? 'N/A';
                            $address = $loc->address ?? 'Address Unavailable';

                            $imagePath = $loc instanceof \App\Models\Location
                                ? $loc->resolved_image
                                : asset($loc->image ?? 'images/projects/1.webp');
                        @endphp

                        <div class="col-lg-4 text-center">
                            <div class="relative">
                                <a href="{{ route('location.show', $loc) }}"class="d-block hover">

                                    <div class="relative overflow-hidden rounded-1 shadow-soft">

                                        <!-- Hover Button -->
                                        <div class="absolute z-2 start-0 w-100 abs-middle fs-36 text-white text-center">
                                            <span class="btn-main hover-op-1">
                                                View Location
                                            </span>
                                        </div>

                                        <!-- Image -->
                                        <img src="{{ $imagePath }}"
                                            class="img-fluid hover-scale-1-2"
                                            alt="{{ $city }}">

                                        <!-- Bottom Info Card -->
                                        <div class="hover-op-0 abs p-3 bottom-0 text-center text-dark w-100">
                                            <div class="bg-white rounded-1 p-4">
                                                <h4 class="mb-0">
                                                    {{ $city }}, {{ $state }}
                                                </h4>
                                                <small>
                                                    {{ $address }}
                                                </small>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>

    </div>

@endsection