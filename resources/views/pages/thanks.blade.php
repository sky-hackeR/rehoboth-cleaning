@extends('layouts.app')

@section('content')
    <section data-bgimage="url(images/background/1.webp) center" class="no-bottom relative overflow-hidden" style="background: url({{ asset('images/background/1.webp') }}) center;">
        <div id="shine-wrapper"><div class="template shine"></div></div>
        
        <div class="container relative z-1000">
            <div class="row g-4 align-items-center justify-content-center text-center">
                <div class="col-lg-8 py-5">
                    <div class="relative z-1000">
                        <div class="fa fa-paper-plane fs-64 id-color-2 mb-4 wow fadeInUp"></div>
                        
                        <h1 class="wow fadeInUp" data-wow-delay=".2s">
                            Your Quote is on the way!
                        </h1>
                        
                        <p class="lead wow fadeInUp text-dark" data-wow-delay=".4s">
                            Thank you for choosing Rehoboth Cleaning. We've sent a customized PDF estimate 
                            to your inbox. Please check your email (and spam folder) shortly.
                        </p>

                        <div class="spacer-20"></div>

                        <div class="wow fadeInUp" data-wow-delay=".6s">
                            <a class="btn-main" href="/">Return to Homepage</a>
                            <a class="btn-main btn-line" style="margin-left:10px;" href="https://wa.me/yournumber">
                                <i class="fa fa-whatsapp"></i> Chat with Us
                            </a>
                        </div>
                    </div>
                </div>

                <div class="spacer-double"></div>
                
                <div class="col-lg-6">
                    <img src="{{ asset('images/misc/1.webp') }}" class="w-100 wow fadeInUp" alt="Cleaning Services">
                </div>
            </div>
        </div>
    </section>
@endsection