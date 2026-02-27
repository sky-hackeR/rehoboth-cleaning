@extends('layouts.app')

@section('content')

@php
    $top = config('contact.top_section', []);
    $contact = config('contact.info', []);
@endphp

<div id="content" class="no-bottom pt-100">

<section aria-label="section">
    <div class="container">

        <div class="row mb-5 wow fadeInUp">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="subtitle">Get In Touch</div>
                <h2 class="mb-2">{{ $top['title'] ?? 'Contact Us' }}</h2>
                <p class="mb-0 text-secondary">{{ $top['subtitle'] ?? '' }}</p>
            </div>
        </div>

        <div class="row g-4 align-items-start">

            <div class="col-lg-4 wow fadeInRight" data-wow-delay=".2s">

                <div class="bg-color-3 text-white rounded-10px p-4 shadow-sm mb-4">
                    <h4 class="mb-4 border-bottom border-white border-opacity-10 pb-3">Contact Info</h4>

                    <div class="contact-item d-flex mb-4">
                        <i class="fa fa-phone text-success me-3 mt-1"></i>
                        <div>
                            <small>Sales & Support</small>
                            <p class="mb-0 fw-bold">{{ $contact['phone_sales'] ?? '' }}</p>
                        </div>
                    </div>

                    <div class="contact-item d-flex mb-4">
                        <i class="fa fa-envelope text-success me-3 mt-1"></i>
                        <div>
                            <small>Email Address</small>
                            <p class="mb-0 fw-bold text-break">{{ $contact['email'] ?? '' }}</p>
                        </div>
                    </div>

                    <div class="contact-item d-flex mb-4">
                        <i class="fa fa-location-dot text-success me-3 mt-1"></i>
                        <div>
                            <small>Main Office</small>
                            <p class="mb-0 fw-bold">{{ $contact['address'] ?? '' }}</p>
                        </div>
                    </div>

                    <div class="contact-item d-flex">
                        <i class="fa fa-clock text-success me-3 mt-1"></i>
                        <div>
                            <small>Office Hours</small>
                            <p class="mb-0 fw-bold">{{ $contact['office_hours'] ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="social-box rounded-10px p-4 text-center">
                    <div class="social-label">Follow Us</div>
                    <div class="social-icons-wrapper">
                        @foreach(config('contact.socials', []) as $icon => $link)
                            <a href="{{ $link }}" target="_blank" class="social-icon-link">
                                <i class="fa-brands fa-{{ $icon }}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="col-lg-8 wow fadeInLeft" data-wow-delay=".2s">
                <div class="contact-form-box rounded-10px p-4 p-md-5">

                    <h4 class="mb-4">Send Us A Message</h4>

                    @if(session('success'))
                        <div class="alert alert-success rounded-1px mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" class="row g-4">
                        @csrf

                        <div class="col-md-6">
                            <label class="fw-bold mb-1 small text-uppercase ls-1">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold mb-1 small text-uppercase ls-1">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                        </div>

                        <div class="col-md-12">
                            <label class="fw-bold mb-1 small text-uppercase ls-1">Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Best contact number" required>
                        </div>

                        <div class="col-md-12">
                            <label class="fw-bold mb-1 small text-uppercase ls-1">Message</label>
                            <textarea name="message" rows="5" class="form-control" placeholder="How can we help you?" required></textarea>
                        </div>

                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn-main w-100 fw-bold text-uppercase ls-2">
                                Send Message
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

</div>

<style>
.pt-100 { padding-top: 100px; }
.rounded-10px { border-radius: 10px !important; }
.ls-1 { letter-spacing: 1px; }
.ls-2 { letter-spacing: 2px; }

.contact-item small {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    opacity: .6;
    display: block;
    margin-bottom: 2px;
}

.contact-item p {
    font-size: 15px;
}

.social-box {
    background: #fff;
    border: 1px solid rgba(0,0,0,0.05);
    box-shadow: 0 10px 30px rgba(0,0,0,0.03);
}

.social-label {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 20px;
    color: #888;
}

.social-icons-wrapper {
    display: flex;
    justify-content: center;
    gap: 12px;
}

.social-icons-wrapper i {
    width: 42px;
    height: 42px;
    line-height: 42px;
    font-size: 16px;
    border-radius: 50%;
    background: #ffffff;
    color: #333;
    border: 1px solid #eee;
    text-align: center;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    display: flex;
    align-items: center;
    justify-content: center;
}

.social-icons-wrapper a:hover i {
    background: var(--primary-color);
    color: #fff;
    border-color: var(--primary-color);
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.1);
}

.contact-form-box {
    background: #fff;
    border: 1px solid #eee;
    box-shadow: 0 15px 40px rgba(0,0,0,0.04);
}

.form-control {
    background: #fcfcfc !important;
    border: 1px solid #eee !important;
    border-radius: 8px !important;
    padding: 14px !important;
    transition: all .3s ease;
}

.form-control:focus {
    background: #fff !important;
    border-color: var(--primary-color) !important;
    box-shadow: none !important;
}

.btn-main {
    height: 55px;
    line-height: 55px;
    padding: 0;
    border-radius: 8px;
    background-color: var(--primary-color);
    color: #fff;
    border: none;
    transition: all .3s;
}

.btn-main:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}
</style>

@endsection