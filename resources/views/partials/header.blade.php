<header class="header-light transparent">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">

                    <!-- Brand / Logo -->
                    <div class="de-flex-col">
                        <div id="logo">
                            <a href="{{ url(config('welcome.header.brand.url')) }}">
                                <h3 class="mb-0" style="color:var(--primary-color); font-weight:800;">
                                    {{ config('welcome.header.brand.company_name') }}
                                </h3>
                                <small style="letter-spacing:2px; color:var(--secondary-color); font-weight:bold;">
                                    {{ config('welcome.header.brand.company_tagline') }}
                                </small>
                            </a>
                        </div>
                    </div>

                    <!-- Main Menu -->
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            @foreach(config('welcome.header.menu') as $menu)
                                <li>
                                    <a class="menu-item" href="{{ url($menu['url']) }}">{{ $menu['title'] }}</a>

                                    @if($menu['title'] === 'Services')
                                        <ul>
                                            @foreach(\App\Models\Service::limit(4)->get() as $service)
                                                <li>
                                                    <a class="menu-item" href="{{ route('service.show', $service->slug) }}">
                                                        {{ $service->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Call-to-Action / Button -->
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <a href="{{ url(config('welcome.header.cta.button_url')) }}" class="btn-main">
                                {{ config('welcome.header.cta.button_text') }}
                            </a>
                            <span id="menu-btn"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>