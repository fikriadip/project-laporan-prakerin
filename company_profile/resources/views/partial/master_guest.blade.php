<!DOCTYPE html>
<html lang="en">

<head>
    <!--
    meta tags
    -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
    title tag
    -->
    <title>@yield('title_web')</title>

    <!--
    favicon
    -->
    <link rel="icon" href="{{asset('images/favicon.png')}}">

    <!--
    stylesheets
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="{{asset('guest/assets/css/fonts/spartan.css?family=Spartan:wght@500;600;700&display=swap')}}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('guest/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/assets/css/glightbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/assets/css/overlay-scrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/assets/css/swiper-bundle.min.css')}}">

    <link rel="stylesheet" href="{{asset('guest/assets/css/style.css')}}">
    @stack('link')
</head>

<body>

    <div class="main-wrapper">

        <!--
        preloader - start
        -->
        <div class="preloader">
            <div class="preloader-wrapper">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewbox="0 0 200 200">
                    <g class="pre load6">
                        <path fill="#1B1A1C" d="M124.5,57L124.5,57c0,3.9-3.1,7-7,7h-36c-3.9,0-7-3.1-7-7v0c0-3.9,3.1-7,7-7h36
                C121.4,50,124.5,53.1,124.5,57z"></path>
                        <path fill="#1B1A1C" d="M147.7,86.9L147.7,86.9c-2.7,2.7-7.2,2.7-9.9,0l-25.5-25.5c-2.7-2.7-2.7-7.2,0-9.9l0,0
                c2.7-2.7,7.2-2.7,9.9,0L147.7,77C150.5,79.8,150.5,84.2,147.7,86.9z"></path>
                        <path fill="#1B1A1C" d="M143,74.5L143,74.5c3.9,0,7,3.1,7,7v36c0,3.9-3.1,7-7,7l0,0c-3.9,0-7-3.1-7-7v-36
                C136,77.6,139.1,74.5,143,74.5z"></path>
                        <path fill="#1B1A1C" d="M148.4,112.4L148.4,112.4c2.7,2.7,2.7,7.2,0,9.9L123,147.7c-2.7,2.7-7.2,2.7-9.9,0h0c-2.7-2.7-2.7-7.2,0-9.9
                l25.5-25.5C141.3,109.6,145.7,109.6,148.4,112.4z"></path>
                        <path fill="#1B1A1C"
                            d="M125.5,143L125.5,143c0,3.9-3.1,7-7,7h-36c-3.9,0-7-3.1-7-7l0,0c0-3.9,3.1-7,7-7h36 C122.4,136,125.5,139.1,125.5,143z">
                        </path>
                        <path fill="#1B1A1C" d="M52.3,113.1L52.3,113.1c2.7-2.7,7.2-2.7,9.9,0l25.5,25.5c2.7,2.7,2.7,7.2,0,9.9h0c-2.7,2.7-7.2,2.7-9.9,0
                L52.3,123C49.5,120.2,49.5,115.8,52.3,113.1z"></path>
                        <path fill="#1B1A1C"
                            d="M57,75.5L57,75.5c3.9,0,7,3.1,7,7v36c0,3.9-3.1,7-7,7h0c-3.9,0-7-3.1-7-7v-36C50,78.6,53.1,75.5,57,75.5z">
                        </path>
                        <path fill="#1B1A1C" d="M86.9,52.3L86.9,52.3c2.7,2.7,2.7,7.2,0,9.9L61.5,87.6c-2.7,2.7-7.2,2.7-9.9,0l0,0c-2.7-2.7-2.7-7.2,0-9.9
                L77,52.3C79.8,49.5,84.2,49.5,86.9,52.3z"></path>
                    </g>
                </svg>
            </div>
        </div>
        <!--
        preloader - end
        -->


        <!--
        navigation - start
        -->
        @include('partial.layouts.guest.navbar')
        <!--
        navigation - end
        -->

        <!--
        page header - start
        -->
        <div class="page-header">
            <div class="page-header-wrapper">
                <div class="page-header-inner">
                    <div class="container">
                        @yield('page-header-inner')
                    </div>
                </div>
                <div class="background-pattern background-pattern-2">
                    <div class="background-pattern-img background-loop"
                        style="background-image: url(guest/assets/images/patterns/pattern.jpg);"></div>
                    <div class="background-pattern-gradient"></div>
                    <div class="background-pattern-bottom">
                        <div class="image" style="background-image: url(guest/assets/images/patterns/pattern-2.jpg)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        page header - end
        -->

        @yield('content')

        @include('partial.layouts.guest.footer')

    </div>

    <!--
    scripts
    -->
    <script src="{{asset('guest/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/overlay-scrollbars.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/gsap.min.js')}}"></script>
    <script src="{{asset('guest/assets/js/main.js')}}"></script>
    @stack('script')
</body>

</html>