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
    <title>Bimbel Primago</title>

    <!--
    favicon
    -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}" />

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
        <div class="navigation">
            <div class="navigation-wrapper">
                <div class="container">
                    <div class="navigation-inner">
                        <div class="navigation-logo">
                            <a href="index.html">
                                <img src="{{asset('guest/assets/images/logo.png')}}" alt="orions-logo">
                            </a>
                        </div>
                        <div class="navigation-menu">
                            <div class="mobile-header">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="{{asset('guest/assets/images/logo-white.png')}}" alt="image">
                                    </a>
                                </div>
                                <ul>
                                    <li class="close-button">
                                        <i class="fas fa-times"></i>
                                    </li>
                                </ul>
                            </div>
                            <ul class="parent">
                                <li>
                                    <a href="{{ route('guest.home') }}" class="link-underline link-underline-1">
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('guest.about') }}" class="link-underline link-underline-1">
                                        <span>About</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('guest.contact') }}" class="link-underline link-underline-1">
                                        <span>Contact</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="social">
                                <h6>Follow</h6>
                                <ul>
                                    <li>
                                        <a href="https://twitter.com/bimbelPRIMAGO">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.facebook.com/BimbelMasukGontor">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://instagram.com/bimbelprimago">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/channel/UCholBpqqBBc8ZvM95KbZePg">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="background-pattern">
                                <div class="background-pattern-img background-loop"
                                    style="background-image: url({{asset('guest/assets/images/patterns/pattern.jpg')}});">
                                </div>
                                <div class="background-pattern-gradient"></div>
                            </div>
                        </div>
                        <div class="navigation-bar">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        navigation - end
        -->

        <!--
        hero 1 - start
        -->
        <div class="hero hero-1 feature-section feature-section-0">
            <div class="hero-wrapper">
                <div class="container">
                    <div class="row">
                        @foreach ($hero as $data)
                        <div class="col-lg-6 offset-lg-0 order-lg-1 col-10 offset-1 order-2">
                            <div class="hero-content">
                                <h1 class="c-dark">{{ $data->title }}</h1>
                                <p class="large c-grey">{{ $data->content }}</p>
                                <div class="download-button-group">
                                    <a href="{{ route('guest.contact') }}"
                                        class="download-button download-button-google">
                                        <div class="download-button-inner c-white">
                                            <div class="download-button-icon">
                                                <i class="fas fa-arrow-right"></i>
                                            </div>
                                            <div class="download-button-content">
                                                <h5 class="upper ls-1">get it touch</h5>
                                                <h3 class="ls-2">Get Started</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1 order-lg-2 col-10 offset-1 order-1">
                            <div class="hero-image">
                                <div class="feature-section-image">
                                    <img src="{{ "data:image/" . $data->imageType . ";base64," . $data->photo_behind }}"
                                        class="image" style="width: 270; height: 452;" alt="image">
                                    <img src="{{ "data:image/" . $data->imageType . ";base64," . $data->photo }}"
                                        class="phone" style="width: 330; height: 627;" alt="phone">
                                    <div class="background-pattern background-pattern-radius">
                                        <div class="background-pattern-img background-loop"
                                            style="background-image: url({{asset('guest/assets/images/patterns/pattern.jpg')}});">
                                        </div>
                                        <div class="background-pattern-gradient"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!--
        hero 1 - end
        -->

        <!--
        feature section - start
        -->
        <div class="feature-section feature-section-1 feature-section-spacing-2">
            <div class="feature-section-wrapper">
                <div class="container">
                    <div class="row gx-5">
                        @foreach ($detail as $data)
                        <div class="col-lg-5 offset-lg-0 col-10 offset-1">
                            <div class="feature-section-image">
                                <img src="{{ "data:image/" . $data->imageType . ";base64," . $data->photo_behind }}"
                                    class="image" alt="image">
                                <img src="{{ "data:image/" . $data->imageType . ";base64," . $data->photo }}"
                                    class="phone" alt="phone">
                                <div class="background-pattern background-pattern-radius-reverse">
                                    <div class="background-pattern-img background-loop"
                                        style="background-image: url({{asset('guest/assets/images/patterns/pattern.jpg')}});">
                                    </div>
                                    <div class="background-pattern-gradient"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-10 offset-1">
                            <div class="feature-section-content">
                                <div class="section-heading">
                                    <div class="sub-heading c-purple upper ls-1">
                                        <i class="las la-cog"></i>
                                        <h5>our facilities</h5>
                                    </div>
                                    <div class="main-heading c-dark">
                                        <h1>{{ $data->title }}</h1>
                                    </div>
                                </div>
                                @endforeach
                                @foreach ($desk_detail as $data)
                                <div class="icon-text-1-group">
                                    <div class="icon-text-1">
                                        <i class="las la-check-square"></i>
                                        <div>
                                            <h4 class="c-dark">{{ $data->title }}</h4>
                                            <p class="c-grey">{{ $data->content }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        feature section - end
        -->

        <!--
        video section - start
        -->
        <div class="video-section">
            <div class="video-section-wrapper">
                <div class="container">
                    @foreach ($video as $data)
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 order-lg-1 col-10 offset-1 order-2">
                            <div class="video-section-content">
                                <div class="section-heading section-heading-1 center-responsive c-white">
                                    <div class="sub-heading upper ls-1">
                                        <i class="las la-video"></i>
                                        <h5>our video</h5>
                                    </div>
                                    <div class="main-heading">
                                        <h1>{{ $data->title }}</h1>
                                    </div>
                                </div>
                                <a href="https://www.youtube.com/c/PRIMAGOChannel" target="_blank"
                                    class="button button-1">
                                    <div class="button-inner">
                                        <div class="button-content">
                                            <h4>Youtube Channel</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1 order-lg-2 order-1">
                            <div class="video-section-video">
                                <figure>
                                    <img class="drop-shadow-1"
                                        src="{{ "data:image/" . $data->imageType . ";base64," . $data->photo }}"
                                        style="width: 471; height: 472;" alt="image">

                                    <div class="play">
                                        <a href="{{ $data->link_video }}" class="glightbox">
                                            <i class="la la-play"></i>
                                        </a>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="background-pattern background-pattern-radius drop-shadow-1">
                        <div class="background-pattern-img background-loop"
                            style="background-image: url({{asset('guest/assets/images/patterns/pattern.jpg')}});"></div>
                        <div class="background-pattern-gradient"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--
        video section - end
        -->

        <!--
        testimonial section - start
        -->
        <div class="testimonial-section">
            <div class="testimonial-section-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                            <div class="section-heading center width-55">
                                <div class="sub-heading c-purple upper ls-1">
                                    <i class="las la-comments"></i>
                                    <h5>feedbacks</h5>
                                </div>
                                <div class="main-heading c-dark">
                                    <h1>What they are saying about us</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="testimonial-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($testimonial as $data)
                                    <div class="swiper-slide">
                                        <div class="testimonial-slide">
                                            <div class="image">
                                                <div class="image-wrapper">
                                                    <div class="image-inner">
                                                        <img src="{{asset('images/user_testi.png')}}"
                                                            style="width: 203; height: 203;" class="rounded-cirle"
                                                            alt="testimony-image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p>“{{ $data->content }}”</p>
                                                <h5>— {{ $data->name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        testimonial section - end
        -->

        <!--
        faq section - start
        -->
        <div class="faq-section">
            <div class="faq-section-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-10 offset-xxl-1 col-lg-12 offset-lg-0 col-10 offset-1">
                            <div class="section-heading center width-64">
                                <div class="sub-heading c-purple upper ls-1">
                                    <i class="las la-file-alt"></i>
                                    <h5>discover</h5>
                                </div>
                                <div class="main-heading c-dark">
                                    <h1>Frequently Asked Questions</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-9 col-md-8 col-10">
                            <div class="faq-wrapper">
                                <div class="faq" id="faq-accordion">
                                    <!--
                                accordion item - start
                                -->
                                    @foreach ($faq as $data)
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="faq-1">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#faq-collapse-{{ $data->id }}"
                                                aria-expanded="true" aria-controls="faq-collapse-1">
                                                <span>{{ $data->question }}</span>
                                            </button>
                                        </div>
                                        <div id="faq-collapse-{{ $data->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="faq-1" data-bs-parent="#faq-accordion">
                                            <div class="accordion-body">
                                                <p>{{ $data->answer }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--
                                accordion item - end
                                -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        faq section - end
        -->

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