@extends('layouts.app')

@section('content')

    @php
        $hero = config('welcome.home.hero');
        $about = config('welcome.home.about');
        $features = config('welcome.home.features');
        $services = \App\Models\Service::take(6)->get();
    @endphp

    <section data-bgimage="url(images/background/1.webp) center" class="no-bottom relative overflow-hidden">
        <div id="shine-wrapper"><div class="template shine"></div></div>
        <div class="container relative z-1000">
            <div class="row g-4 align-items-center justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="relative z-1000">
                        <div class="subtitle wow fadeInUp">{{ $hero['subtitle'] ?? 'Trusted Across Canada' }}</div>
                        <h1 class="wow fadeInUp" data-wow-delay=".2s">{!! $hero['title'] ?? 'Exceptional Clean for <br><span class="id-color-2">Exceptional Businesses</span>' !!}</h1>
                    </div>
                </div>

                <div class="col-lg-5 text-center">
                    <p class="lead wow fadeInUp" data-wow-delay=".4s">{{ $hero['description'] ?? 'Rehoboth Cleaning and Janitorial Services provides hospital-grade disinfection and customized facility maintenance from Toronto to Vancouver.' }}</p>
                    <div class="spacer-10"></div>
                    @foreach($hero['cta_buttons'] ?? [] as $button)
                        <a class="{{ $button['class'] ?? 'btn-main' }} wow fadeInUp" href="{{ $button['href'] ?? '#quote' }}">{{ $button['text'] ?? 'Start Your Quote' }}</a>
                    @endforeach
                    @if(empty($hero['cta_buttons']))
                        <a class="btn-main wow fadeInUp" href="#quote">Start Your Quote</a>
                        <a class="btn-main btn-line wow fadeInUp" style="margin-left:10px;" href="https://wa.me/yournumber">WhatsApp Us</a>
                    @endif
                </div>

                <div class="spacer-10"></div>
                <div class="col-lg-8">
                    <img src="{{ $hero['foreground_image'] ?? 'images/misc/1.webp' }}" class="w-100"
                        data-0="transform: translateY(0px);"
                        data-1000="transform: translateY(300px);" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="pt-0 pb-0 bg-primary-custom text-white">
        <div class="container-fluid">
            <div class="row p-3">
                <div class="col-md-12 text-center">
                    <div class="de_marquee_list">
                        @foreach(\App\Models\Location::orderBy('city')->take(5)->get() as $location)
                            <span class="mx-4">
                                <i class="fa fa-map-marker id-color-2"></i> {{ strtoupper($location->city) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-color-3 text-light section-dark">
        <div class="container relative">
            <div class="row g-4 gx-5 align-items-center">

                <div class="col-lg-6 relative">
                    <div class="relative z-1000">
                        <div class="subtitle wow fadeInUp">
                            {{ $about['subtitle'] }}
                        </div>

                        <h2>{!! $about['title'] !!}</h2>

                        <p>{{ $about['description'] }}</p>

                        <a class="{{ $about['cta_button']['class'] }} wow fadeInUp"
                        data-wow-delay=".6s"
                        href="{{ $about['cta_button']['href'] }}">
                            {{ $about['cta_button']['text'] }}
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-6">
                            <img src="{{ asset($about['images'][0]) }}"
                                class="img-fluid rounded-10 mb-4 w-70 ms-30 wow scaleIn" alt="">
                            <img src="{{ asset($about['images'][1]) }}"
                                class="img-fluid rounded-10 wow scaleIn" alt="">
                        </div>
                        <div class="col-6">
                            <div class="spacer-single sm-hide"></div>
                            <img src="{{ asset($about['images'][2]) }}"
                                class="img-fluid rounded-10 mb-4 wow scaleIn" alt="">
                            <img src="{{ asset($about['images'][3]) }}"
                                class="img-fluid rounded-10 w-70 wow scaleIn" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-color-3 no-top text-light section-dark relative">

        <img src="{{ asset('images/deco/s1.webp') }}"
            class="w-10 mt-min-60 abs start-10 wow scaleOut" alt="">

        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 offset-lg-3 text-center">

                    <div class="subtitle wow fadeInUp mb-3">
                        Our Services
                    </div>

                    <h2 class="wow fadeInUp" data-wow-delay=".2s">
                        Our Cleaning Services
                    </h2>

                    <p class="lead mb-0 wow fadeInUp">
                        Whether it's a quick refresh or a deep clean transformation,
                        our expert touch leaves your home or office shining.
                    </p>

                    <div class="spacer-single"></div>
                    <div class="spacer-half"></div>

                </div>
            </div>
        </div>
    </section>

    <section class="pt-0">
        <div class="container mt-min-120">
            <div class="row g-4">

                @foreach($services as $service)
                    <div class="col-lg-4 col-sm-6">

                        <div class="relative mb-3">

                            <a href="{{ route('service.show', $service->slug) }}"
                            class="d-block hover mb-3">

                                <div class="relative overflow-hidden rounded-1 shadow-soft">

                                    <img src="{{ asset('images/misc/flowers-crop-3-white.webp') }}"
                                        class="w-50 end-0 absolute hover-op-0"
                                        alt="">

                                    <div class="absolute z-2 start-0 w-100 abs-middle fs-36 text-white text-center">
                                        <span class="btn-main hover-op-1">
                                            Read More
                                        </span>
                                    </div>

                                    <img src="{{ $service->resolved_image }}"
                                        class="img-fluid hover-scale-1-2"
                                        alt="{{ $service->name }}">

                                </div>
                            </a>

                            <h4>{{ $service->name }}</h4>

                            {{-- <p class="no-bottom">
                                {{ \Illuminate\Support\Str::limit(strip_tags($service->content), 100) }}
                            </p> --}}

                            <p class="no-bottom">
                                {{ strip_tags($service->description) }}
                            </p>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <section class="bg-light">
        <div class="container">
            <div class="row g-4">
                @foreach($features as $feature)
                    <div class="col-lg-3 col-md-6">
                        <div class="text-center">
                            <img src="{{ $feature['icon'] }}" class="bg-color w-30 p-15 rounded-10 mb-3 wow scaleIn" alt="">
                            <div class="relative wow fadeInUp">
                                <h4>{{ $feature['title'] }}</h4>
                                <p class="mb-0">{{ $feature['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="quote" class="bg-color-3 py-20 mt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 text-white">
                    <h2>Ready for a <br>Better Clean?</h2>
                    <p>Get an instant estimate for your facility based on our local Canadian regional rates.</p>
                    <ul class="list-s1">
                        <li>Transparent Sq. Ft. Pricing</li>
                        <li>Eco-Friendly Products Used</li>
                        <li>24/7 Local Support</li>
                    </ul>
                </div>
                <div class="col-lg-7">
                    <div class="bg-white p-5 rounded-10 shadow-lg">
                        @livewire('quote-wizard')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
