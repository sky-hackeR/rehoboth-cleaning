@extends('layouts.app')

@section('content')
@php
    $top = config('about.top_section', []);
    $about = config('about.about', []);
    $sections = config('about.content_sections', []);
@endphp

<div id="content" class="no-bottom" style="padding-top: auto !important; margin-top: 0 !important;">

    <section class="bg-color-3 section-dark text-light pb-0 pt-4 relative overflow-hidden">
        <img src="{{ asset($top['decor_image'] ?? '') }}" class="w-5 mt-min-60 abs start-10 bottom-10 wow scaleOut" alt="">
        <div id="shine-wrapper"><div class="template shine"></div></div>

        <div class="container relative z-1000">
            <div class="row g-3 align-items-center">

                <div class="col-lg-6">
                    <div class="relative z-1000">
                        <h1 class="wow fadeInUp mb-1" data-wow-delay=".2s">{{ $top['title'] ?? '' }}</h1>
                        <p class="lead col-lg-10 mb-0 wow fadeInUp" data-wow-delay=".4s">{{ $top['subtitle'] ?? '' }}</p>
                        <div class="spacer-single"></div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="{{ asset($top['image'] ?? '') }}" class="w-100"
                         data-0="transform: translateY(0px);"
                         data-500="transform: translateY(300px);"
                         alt="">
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container relative">
            <div class="row g-4 gx-5 align-items-center">

                <div class="col-lg-6 relative">
                    <div class="relative z-1000">
                        @if(!empty($about['subtitle']))
                            <div class="subtitle wow fadeInUp" data-wow-delay=".0s">{{ $about['subtitle'] }}</div>
                        @endif

                        @if(!empty($about['title']))
                            <h2>{!! $about['title'] !!}</h2>
                        @endif

                        @if(!empty($about['description']))
                            <p>{{ $about['description'] }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">
                        @if(!empty($about['images']))
                            <div class="col-6">
                                <img src="{{ asset($about['images'][0] ?? '') }}" class="img-fluid rounded-10 mb-4 w-70 ms-30 wow scaleIn" alt="">
                                <img src="{{ asset($about['images'][1] ?? '') }}" class="img-fluid rounded-10 wow scaleIn" alt="">
                            </div>
                            <div class="col-6">
                                <div class="spacer-single sm-hide"></div>
                                <img src="{{ asset($about['images'][2] ?? '') }}" class="img-fluid rounded-10 mb-4 wow scaleIn" alt="">
                                <img src="{{ asset($about['images'][3] ?? '') }}" class="img-fluid rounded-10 w-70 wow scaleIn" alt="">
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    @foreach($sections as $section)
        @if(isset($section['members']))
            <section class="border-top">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-6 offset-lg-3 text-center">
                            <div class="subtitle wow fadeInUp mb-3">{{ $section['subtitle'] }}</div>
                            <h2 class="wow fadeInUp">{{ $section['title'] }}</h2>
                        </div>
                    </div>
                    <div class="row g-4">
                        @foreach($section['members'] as $member)
                            <div class="col-lg-3 text-center">
                                <img src="{{ about_image(basename($member['image']), 500) }}" class="img-fluid rounded-10px" alt="{{ $member['name'] }}">
                                <div class="p-3 text-center">
                                    <h4 class="mb-0">{{ $member['name'] }}</h4>
                                    <p class="mb-2">{{ $member['role'] }}</p>
                                    <div class="social-icons">
                                        @foreach($member['social'] as $platform => $link)
                                            <a href="{{ $link }}"><i class="bg-white id-color bg-hover-2 text-hover-white fa-brands fa-{{ $platform }}"></i></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endforeach

</div>
@endsection