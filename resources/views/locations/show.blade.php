@extends('layouts.app')

@section('content')

<div class="no-bottom no-top" id="content">

    <div id="top"></div>

    <!-- Header -->
    <section id="subheader">
        <div class="container relative z-index-1000">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <h1>{{ $location->city }}, {{ $location->state }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-80 pb-120">
        <div class="container">

            <div class="row g-5">

                <!-- MAIN CONTENT -->
                <div class="col-lg-8">

                    <!-- Featured Image -->
                    @if($location->resolved_image)
                    <div class="mb-4">
                        <img src="{{ $location->resolved_image }}"
                             class="img-fluid rounded-10 w-100"
                             style="max-height:480px; object-fit:cover;"
                             alt="{{ $location->city }}">
                    </div>
                    @endif

                    <!-- Dynamic Title -->
                    <h2 class="mb-3">{{ $contentTitle }}</h2>

                    <!-- Dynamic Body -->
                    <div class="mb-5">
                        {!! $contentBody !!}
                    </div>

                </div>

                <!-- SIDEBAR -->
                <div class="col-lg-4">

                    <div class="p-4 bg-light rounded-20 shadow-soft">

                        <h4 class="mb-4 text-center">Other Locations</h4>

                        <div class="d-flex flex-column align-items-center">
                            @foreach($otherLocations as $other)
                                <div class="d-flex flex-lg-row flex-column align-items-center mb-4 w-100">

                                    <!-- Thumbnail -->
                                    <div class="me-lg-3 mb-2 mb-lg-0" style="flex-shrink:0; width:70px;">
                                        <img src="{{ $other->resolved_image }}"
                                             class="img-fluid rounded-10"
                                             style="height:60px; object-fit:cover;"
                                             alt="{{ $other->city }}">
                                    </div>

                                    <!-- Text -->
                                    <div class="text-center text-lg-start flex-grow-1">
                                        <a href="{{ route('location.show', $other) }}"
                                           class="text-dark fw-600 d-block">
                                            {{ $other->city }}, {{ $other->state }}
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                        {{-- <!-- Contact Info Block -->
                        <div class="p-4 bg-white rounded-20 mt-4 w-100">
                            <p><strong>Address:</strong> {{ $location->address }}</p>
                            <p><strong>Phone:</strong> {{ $location->phone_number }}</p>
                            <p><strong>Email:</strong> {{ $location->manager_email }}</p>
                            <p><strong>Zip Codes:</strong> {{ $location->zip_codes }}</p>
                        </div> --}}

                    </div>
                    <br>

                    <div class="p-4 bg-light rounded-10 mt-4 w-100 shadow-soft">
                        <p><strong class="text-dark">Address:</strong> {{ $location->address }}</p>
                        <p><strong class="text-dark">Phone:</strong> {{ $location->phone_number }}</p>
                        <p><strong class="text-dark">Email:</strong> {{ $location->manager_email }}</p>
                        <p><strong class="text-dark">Zip Codes:</strong> {{ $location->zip_codes }}</p>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

@endsection