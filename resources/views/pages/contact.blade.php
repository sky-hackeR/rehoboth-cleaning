@extends('layouts.app')

@section('content')
<section class="section pt-5 pb-5">
    <div class="container">
        <h1>Contact Us</h1>
        <p>Enjoy a spotless space with our expert cleaning team. Affordable, eco-friendly, and tailored to your needs!</p>

        <div class="row mt-4">
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li><strong>Sales:</strong> {{ $contact['phone_sales'] }}</li>
                    <li><strong>Support:</strong> {{ $contact['phone_support'] }}</li>
                    <li><strong>Whatsapp:</strong> {{ $contact['whatsapp'] }}</li>
                    <li><strong>Email:</strong> {{ $contact['email'] }}</li>
                    <li><strong>Address:</strong> {{ $contact['address'] }}</li>
                    <li><strong>Office Hours:</strong> {{ $contact['office_hours'] }}</li>
                </ul>
            </div>

            <div class="col-md-6">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="phone" class="form-control" placeholder="Your Phone" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="message" class="form-control" rows="5" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection