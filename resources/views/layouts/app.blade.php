<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rehoboth Cleaning & Janitorial Services | Canada's Commercial Choice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/coloring.css') }}" rel="stylesheet">
    <link id="colors" href="{{ asset('css/colors/scheme-01.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

    <style>
        :root {
            --primary-color: #0a2540;
            --secondary-color: #28a745;
        }
        .btn-main { background: var(--secondary-color); border-color: var(--secondary-color); }
        .text-primary-custom { color: var(--primary-color); }
        .bg-primary-custom { background-color: var(--primary-color); }
        .bg-color-3 { background-color: var(--primary-color); }
        #mainmenu li a:hover { color: var(--secondary-color); }
        .id-color-2 { color: var(--secondary-color) !important; }
        .float-text a { color: var(--secondary-color); font-weight: bold; }
    </style>

    @livewireStyles
</head>
<body>
    <div id="wrapper">

        <!-- Scroll to Top Button -->
        <div class="float-text show-on-scroll">
            <span><a href="#">Scroll to top</a></span>
        </div>
        <div class="scrollbar-v show-on-scroll"></div>

        <!-- Page Preloader -->
        <div id="de-loader"></div>

        <!-- Header -->
        @include('partials.header')

        <!-- Main Content -->
        <div class="no-bottom no-top" id="content">
            @yield('content')
        </div>

        <!-- Footer -->
        @include('partials.footer')
    </div>

    <!-- JS -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/designesia.js') }}"></script>
    <script src="{{ asset('js/swiper.js') }}"></script>
    <script src="{{ asset('js/custom-marquee.js') }}"></script>
    <script src="{{ asset('js/custom-swiper-1.js') }}"></script>
    <script src="{{ asset('js/jquery.event.move.js') }}"></script>
    <script src="{{ asset('js/jquery.twentytwenty.js') }}"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/699a412ef9f4b51c3f6e229c/1ji18t7cd';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->


    <script>
        $(window).on("load", function(){
            $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({default_offset_pct: 0.5});
            $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({default_offset_pct: 0.5, orientation: 'vertical'});

            // Scroll-to-top
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $(".float-text").fadeIn();
                } else {
                    $(".float-text").fadeOut();
                }
            });
            $(".float-text a").click(function(e){
                e.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
            });
        });
    </script>

    @livewireScripts
</body>
</html>
