<footer class="section-dark">
    <div class="container">
        <div class="row gx-5">

            <!-- Brand & Description -->
            <div class="col-lg-4 col-sm-6">
                <a href="{{ url('/') }}">
                    <h3 class="mb-0" style="color:white; font-weight:800;">
                        {{ config('welcome.footer.subfooter.company_name') }}
                    </h3>
                    <small style="letter-spacing:2px; color:var(--secondary-color); font-weight:bold;">
                        {{ config('welcome.footer.subfooter.company_tagline') }}
                    </small>
                </a>

                <div class="spacer-20"></div>
                <p>{{ config('welcome.footer.brand.description') }}</p>

                <div class="social-icons mb-sm-30">
                    @foreach(config('welcome.footer.socials') as $platform => $link)
                        <a href="{{ $link }}"><i class="fa-brands fa-{{ $platform }}"></i></a>
                    @endforeach
                </div>
            </div>

            <!-- Company & Services Links -->
            <div class="col-lg-4 col-sm-12 order-lg-1 order-sm-2">
                <div class="row">
                    <!-- Company -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="widget">
                            <h5>Company</h5>
                            <ul>
                                @foreach(config('welcome.footer.company_links') as $link)
                                    <li><a href="{{ url($link['url']) }}">{{ $link['title'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="col-lg-8 col-sm-6">
                        <div class="widget">
                            <h5>Our Services</h5>
                            <ul>
                                @foreach(\App\Models\Service::limit(4)->get() as $service)
                                    <li><a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Office Info -->
            <div class="col-lg-4 col-sm-6 order-lg-2 order-sm-1">
                <div class="widget">
                    <div class="fw-bold text-white"><i class="icofont-wall-clock me-2 id-color-2"></i>We're Open</div>
                    {{ config('welcome.footer.office.hours') }}

                    <div class="spacer-20"></div>

                    <div class="fw-bold text-white"><i class="icofont-location-pin me-2 id-color-2"></i>Office Location</div>
                    {{ config('welcome.footer.office.location') }}

                    <div class="spacer-20"></div>

                    <div class="fw-bold text-white"><i class="icofont-envelope me-2 id-color-2"></i>Send a Message</div>
                    {{ config('welcome.footer.office.email') }}
                </div>
            </div>

        </div>
    </div>

    <!-- Subfooter -->
    <div class="subfooter">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="de-flex">
                        <div class="de-flex-col">
                            {{ config('welcome.footer.subfooter.copyright') }}
                        </div>
                        <ul class="menu-simple">
                            @foreach(config('welcome.footer.subfooter.terms') as $title => $link)
                                <li>
                                    <a href="{{ $link }}" 
                                    onmouseover="this.style.color='#28a745'" 
                                    onmouseout="this.style.color=''">
                                        {{ $title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
