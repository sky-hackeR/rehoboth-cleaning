@extends('layouts.app')

@section('content')

<section class="pt-100 pb-200">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 entrance-fade">
                <h1 class="display-3 fw-bold text-dark mb-3" style="letter-spacing: -2px;">{{ $service->name }}</h1>
                <p class="lead text-dark opacity-50 mb-0" style="max-width: 600px;">
                    {{ $service->description }}
                </p>
            </div>
        </div>
    </div>
</section>

<br><br>

<section class="pb-120 bg-white" style="margin-top: -120px;">
    <div class="container">
        <div class="row g-4">
            
            <div class="col-lg-8">
                <div class="bg-white rounded-32 shadow-canvas overflow-hidden entrance-up">
                    
                    @if($service->resolved_image)
                        <div class="position-relative" style="height: 400px; overflow: hidden;">
                            <img src="{{ $service->resolved_image }}" 
                                 class="w-100 h-100" 
                                 style="object-fit: cover;" 
                                 alt="{{ $service->name }}">
                            <div class="position-absolute bottom-0 start-0 w-100 h-25" style="background: linear-gradient(to top, white, transparent);"></div>
                        </div>
                    @endif

                    <div class="p-4 p-md-5">
                        <div class="content-text lh-lg text-dark opacity-75 mb-5" style="font-size: 18px;">
                            {!! $service->content !!}
                        </div>

                        <div class="row g-0 border-top border-light">
                            <div class="col-md-6 border-end border-light p-4">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-check-circle text-success me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-0">Fully Insured</h6>
                                        <small class="opacity-50">Professional Liability Coverage</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 p-4">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-calendar-alt text-success me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-0">Flexible Schedule</h6>
                                        <small class="opacity-50">Tailored to your timeline</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top entrance-up" style="top: 100px; animation-delay: 0.2s;">
                    
                    <div class="card border-0 shadow-dark rounded-32 mb-4 overflow-hidden" style="background: #0a2540">
                        <div class="card-body p-4 p-xl-5 text-center">
                            <div class="mb-3">
                                <i class="fa fa-calculator fa-3x" style="color: #28a745"></i>
                            </div>
                            <h4 class="fw-bold text-white">Ready to start?</h4>
                            <p class="text-white opacity-50 small px-3">
                                Use our automated tool on the home page to get an instant estimate for <strong>{{ $service->name }}</strong>.
                            </p>
                            
                            <a href="/#quote" class="btn w-100 text-white fw-bold text-uppercase ls-2 quote-fixed-btn" 
                               style="background:#28a745; border-radius: 16px;">
                                Get Instant Quote
                            </a>
                        </div>
                    </div>

                    <div class="bg-white border border-light rounded-32 p-4 shadow-sm">
                        <h6 class="fw-bold small text-uppercase ls-2 mb-3 opacity-50">Related Services</h6>
                        <div class="list-group list-group-flush">
                            @foreach($relatedServices as $related)
                                <a href="{{ route('service.show', $related->slug) }}" 
                                   class="list-group-item list-group-item-action border-0 px-0 py-2 d-flex justify-content-between align-items-center service-link {{ $service->id == $related->id ? 'text-success fw-bold' : '' }}">
                                    {{ $related->name }}
                                    <i class="fa fa-arrow-right small-icon"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="tel:{{ config('business.contact.phone_raw') }}" class="mt-4 d-block text-center text-dark text-decoration-none opacity-50 hover-opacity-100 transition">
                        <i class="fa fa-phone-alt me-2"></i> {{ config('business.contact.phone_display') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .rounded-32 { border-radius: 32px !important; }
    .ls-2 { letter-spacing: 2px; }
    .shadow-canvas { box-shadow: 0 30px 60px rgba(0,0,0,0.08) !important; }
    .shadow-dark { box-shadow: 0 20px 40px rgba(10,37,64,0.3) !important; }
    
    .entrance-fade { opacity: 0; animation: fadeIn 0.8s ease forwards; }
    .entrance-up { opacity: 0; transform: translateY(40px); animation: moveUp 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards; }

    @keyframes fadeIn { to { opacity: 1; } }
    @keyframes moveUp { to { opacity: 1; transform: translateY(0); } }

    .service-link { transition: all 0.3s ease; background: transparent !important; }
    .service-link .small-icon { opacity: 0; transform: translateX(-10px); transition: all 0.3s ease; color: #28a745; }
    .service-link:hover { color: #28a745 !important; padding-left: 10px !important; }
    .service-link:hover .small-icon { opacity: 1; transform: translateX(0); }

    .quote-fixed-btn {
        display: block !important;
        width: 100% !important;
        height: 60px !important;
        line-height: 60px !important; 
        text-align: center !important; 
        padding: 0 !important;
        border: none !important;
        font-size: 14px;
        color: #ffffff !important;
        text-decoration: none !important;
        transition: background-color 0.2s ease, transform 0.2s ease !important;
    }

    .quote-fixed-btn:hover { 
        background-color: #218838 !important;
        transform: scale(1.02);
    }

    .quote-fixed-btn:active {
        transform: scale(0.98);
    }

    .hover-opacity-100:hover { opacity: 1 !important; }
    .transition { transition: all 0.3s ease; }
</style>

@endsection