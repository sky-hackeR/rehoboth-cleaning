<header class="header-light transparent">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div id="logo">
                            <a href="{{ url('/') }}">
                                <h3 class="mb-0" style="color:var(--primary-color); font-weight:800;">REHOBOTH</h3>
                                <small style="letter-spacing:2px; color:var(--secondary-color); font-weight:bold;">JANITORIAL SERVICES</small>
                            </a>
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="{{ url('/') }}">Home</a></li>
                            <li><a class="menu-item" href="#">Services</a>
                                <ul>
                                    @foreach(\App\Models\Service::all() as $service)
                                        <li><a href="{{ route('service.show', $service->slug) }}">{{ $service->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a class="menu-item" href="{{ url('/locations') }}">Locations</a></li>
                            <li><a class="menu-item" href="{{ url('/about') }}">About</a></li>
                            <li><a class="menu-item" href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <a href="#quote" class="btn-main">Get Instant Quote</a>
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>