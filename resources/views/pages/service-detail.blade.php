@extends('layouts.app')

@section('content')

<section class="pt-120 pb-120">
    <div class="container">

        <div class="row">
            <div class="col-lg-8">

                <h1 class="mb-4">{{ $service->name }}</h1>

                @if($service->image)
                    <img src="{{ asset($service->image) }}"
                         class="img-fluid rounded-10 mb-4"
                         alt="{{ $service->name }}">
                @endif

                <div class="mb-5">
                    {!! $service->content !!}
                </div>

            </div>

            <div class="col-lg-4">
                <div class="p-4 bg-light rounded-10">

                    <h4 class="mb-3">Related Services</h4>

                    @foreach($relatedServices as $related)
                        <div class="mb-3">
                            <a href="{{ route('service.show', $related->slug) }}">
                                {{ $related->name }}
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</section>

@endsection
