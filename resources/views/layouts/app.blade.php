<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rehoboth Cleaning & Janitorial Services | Canada's Commercial Choice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/coloring.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/swiper.css') }}" rel="stylesheet" type="text/css" >
    <link id="colors" href="{{ asset('css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css" >
  
    
    <style>
        :root {
            --primary-color: #0a2540; /* Rehoboth Navy */
            --secondary-color: #28a745; /* Rehoboth Green */
        }
        .btn-main { background: var(--secondary-color); border-color: var(--secondary-color); }
        .text-primary-custom { color: var(--primary-color); }
        .bg-primary-custom { background-color: var(--primary-color); }
        .bg-color-3 { background-color: var(--primary-color); }
        #mainmenu li a:hover { color: var(--secondary-color); }
        .id-color-2 { color: var(--secondary-color) !important; }
    </style>
    @livewireStyles
</head>

<body>
    <div id="wrapper">
        @include('partials.header')
        
        <div class="no-bottom no-top" id="content">
            @yield('content')
        </div>

        @include('partials.footer')
    </div>

    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/designesia.js') }}"></script>
    @livewireScripts
</body>
</html>