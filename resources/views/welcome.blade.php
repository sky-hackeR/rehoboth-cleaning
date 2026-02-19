@extends('layouts.app')

@section('content')

    <section data-bgimage="url(images/background/1.webp) center" class="no-bottom relative overflow-hidden">
        <div id="shine-wrapper">
            <div class="template shine"></div>
        </div>

        <div class="container relative z-1000">

            <div class="row g-4 align-items-center justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="relative z-1000">
                        <div class="subtitle wow fadeInUp">Trusted Across Canada</div>
                        <h1 class="wow fadeInUp" data-wow-delay=".2s">Exceptional Clean for <br><span
                                class="id-color-2">Exceptional Businesses</span></h1>
                    </div>
                </div>

                <div class="col-lg-5 text-center">
                    <p class="lead wow fadeInUp" data-wow-delay=".4s">Rehoboth Cleaning and Janitorial Services provides
                        hospital-grade disinfection and customized facility maintenance from Toronto to Vancouver.</p>

                    <div class="spacer-10"></div>

                    <a class="btn-main wow fadeInUp" href="#quote">Start Your Quote</a>
                    <a class="btn-main btn-line wow fadeInUp" style="margin-left:10px;"
                        href="https://wa.me/yournumber">WhatsApp Us</a>
                </div>

                <div class="spacer-10"></div>

                <div class="col-lg-8">
                    <img src="images/misc/1.webp" class="w-100" data-0="transform: translateY(0px);"
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
                        <span class="mx-4"><i class="fa fa-map-marker id-color-2"></i> TORONTO</span>
                        <span class="mx-4"><i class="fa fa-map-marker id-color-2"></i> VANCOUVER</span>
                        <span class="mx-4"><i class="fa fa-map-marker id-color-2"></i> CALGARY</span>
                        <span class="mx-4"><i class="fa fa-map-marker id-color-2"></i> OTTAWA</span>
                        <span class="mx-4"><i class="fa fa-map-marker id-color-2"></i> EDMONTON</span>
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
                        <div class="subtitle wow fadeInUp" data-wow-delay=".0s">About Uclean</div>
                        <h2>Bringing Clean, Comfort, and Care Together</h2>
                        <p>We are a team of passionate cleaning experts who take pride in delivering the highest standard of
                            service. With years of experience in the industry, we’ve perfected our cleaning methods to
                            ensure every job is done right.</p>

                        <a class="btn-main bg-color-2 text-dark wow fadeInUp" data-wow-delay=".6s"
                            href="book-service.html">Book Service Now</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-6">
                            <img src="images/misc/11.webp" class="img-fluid rounded-10 mb-4 w-70 ms-30 wow scaleIn" alt="">
                            <img src="images/misc/3.webp" class="img-fluid rounded-10 wow scaleIn" alt="">
                        </div>
                        <div class="col-6">
                            <div class="spacer-single sm-hide"></div>
                            <img src="images/misc/10.webp" class="img-fluid rounded-10 mb-4 wow scaleIn" alt="">
                            <img src="images/misc/8.webp" class="img-fluid rounded-10 w-70 wow scaleIn" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="mb-4">Our Specialized Services</h2>
                    <p>Tailored solutions for every industry in the Canadian market.</p>
                    <div class="spacer-20"></div>
                </div>
            </div>
            <div class="row g-4">
                @foreach(\App\Models\Service::take(6)->get() as $service)
                    <div class="col-lg-4 col-sm-6">
                        <div class="relative overflow-hidden rounded-1 shadow-soft p-4 border bg-white">
                            <h4 class="text-primary-custom">{{ $service->name }}</h4>
                            <p>{{ Str::limit($service->content, 80) }}</p>
                            <a href="{{ route('service.show', $service->slug) }}" class="id-color-2 fw-bold">Learn More →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <img src="images/icons/white/labor.webp" class="bg-color w-30 p-15 rounded-10 mb-3 wow scaleIn"
                            alt="">
                        <div class="relative wow fadeInUp">
                            <h4>Professional Team</h4>
                            <p class="mb-0">Our trained, insured cleaners ensure professional, trusted service and
                                impeccable results.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <img src="images/icons/white/calendar.webp" class="bg-color w-30 p-15 rounded-10 mb-3 wow scaleIn"
                            alt="">
                        <div class="relative wow fadeInUp">
                            <h4>On Time Service</h4>
                            <p class="mb-0">Reliable, punctual service that respects your schedule and exceeds expectations.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <img src="images/icons/white/best-price.webp" class="bg-color w-30 p-15 rounded-10 mb-3 wow scaleIn"
                            alt="">
                        <div class="relative wow fadeInUp">
                            <h4>Transparent Pricing</h4>
                            <p class="mb-0">Affordable, upfront rates with no hidden costs — quality cleaning at the right
                                price.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <img src="images/icons/white/eco-friendly.webp"
                            class="bg-color w-30 p-15 rounded-10 mb-3 wow scaleIn" alt="">
                        <div class="relative wow fadeInUp">
                            <h4>Eco Friendly</h4>
                            <p class="mb-0">We use non-toxic, eco-friendly products for a safe, healthy, and sparkling
                                environment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="spacer-single"></div>

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