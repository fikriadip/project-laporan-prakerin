<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bimbingan Belajar Primago</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('template_login/img/favicon.png') }}" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


    <!-- Vendor CSS Files -->
    <link href="{{asset('landing_page/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('landing_page/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing_page/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('landing_page/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing_page/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing_page/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('landing_page/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('landing_page/assets/css/style.css')}}" rel="stylesheet">

    @stack('link')

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.html"><span>Bimbel Primago</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                @foreach ($dataHome as $home)
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>{{$home->judul}} <span>{{$home->subjudul}}</span></h1>
                        <h2>{{$home->deskripsi}}</h2>
                        <div class="text-center text-lg-start">
                            <a href="#about" class="btn-get-started scrollto">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ "data:image/" . $home->imageType . ";base64," . $home->image }}" alt="Foto Home"
                        class="img-fluid animated">
                </div>
                @endforeach
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                @foreach ($dataAbout as $about)
                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                        data-aos="fade-right">
                        <a href="{{ $about->link_youtube }}" class="venobox play-btn mb-4" data-vbtype="video"
                            data-autoplay="true" target="_blank"></a>
                    </div>

                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                        data-aos="fade-left">
                        <h3>{{ $about->judul }}</h3>
                        <p>{{ $about->subjudul }}</p>
                        @endforeach

                        @foreach ($dataDeskAbout as $deskAbout)
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="bx bx-list-check"></i></div>
                            <h4 class="title"><a>{{ $deskAbout->judul }}</a></h4>
                            <p class="description">{{ $deskAbout->deskripsi }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Details Section ======= -->
        <section id="details" class="details section-bg">
            <div class="container">

                @foreach ($dataDetails as $details)
                <div class="row content">
                    <div class="col-md-4" data-aos="fade-left">
                        <img src="{{ "data:image/" . $details->imageType . ";base64," . $details->image }}"
                            class="img-fluid" alt="Foto Details">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>{{ $details->judul }}</h3>
                        <p class="fst-italic">
                            {{ $details->subjudul }}
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i>{{ $details->penjelasan1 }}</li>
                            <li><i class="bi bi-check"></i>{{ $details->penjelasan2 }}</li>
                            <li><i class="bi bi-check"></i>{{ $details->penjelasan3 }}</li>
                            <li><i class="bi bi-check"></i>{{ $details->penjelasan4 }}</li>
                        </ul>
                        <p>
                            {{ $details->paragraf }}
                        </p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                        <img src="{{ "data:image/" . $details->imageType . ";base64," . $details->image }}"
                            class="img-fluid" alt="Foto Details">
                    </div>
                    <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                        <h3>{{ $details->judul }}</h3>
                        <p class="fst-italic">
                            {{ $details->subjudul }}
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i>{{ $details->penjelasan1 }}</li>
                            <li><i class="bi bi-check"></i>{{ $details->penjelasan2 }}</li>
                            <li><i class="bi bi-check"></i>{{ $details->penjelasan3 }}</li>
                            <li><i class="bi bi-check"></i>{{ $details->penjelasan4 }}</li>
                        </ul>
                        <p>
                            {{ $details->paragraf }}
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
        </section><!-- End Details Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Gallery</h2>
                    <p>Check our Gallery</p>
                </div>

                <div class="row g-0" data-aos="fade-left">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                            <a href="{{asset('landing_page/assets/img/gallery/gallery-1.jpg')}}"
                                class="gallery-lightbox">
                                <img src="{{asset('landing_page/assets/img/gallery/gallery-1.jpg')}}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Gallery Section -->


        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Team</h2>
                    <p>Our Great Team</p>
                </div>
                <div class="team-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="row" data-aos="fade-left">
                                @foreach ($dataTeam as $team)
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                        <div class="pic"><img
                                                src="{{ "data:image/" . $team->imageType . ";base64," . $team->foto }}"
                                                class="img-fluid" alt=""></div>
                                        <div class="member-info">
                                            <h4>{{ $team->nama }}</h4>
                                            <span>{{ $team->jabatan }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Team Section -->

        <!-- ======= Pricing Section ======= -->
        {{-- <section id="pricing" class="pricing">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Pricing</h2>
                    <p>Check our Pricing</p>
                </div>

                <div class="row" data-aos="fade-left">
                    @foreach ($dataPricing as $pricing)
                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
                            <h3>{{ $pricing->judul }}</h3>
        <h4>IDR {{ $pricing->harga }}</h4>
        <p>{{ $pricing->deskripsi }}</p>
        <div class="btn-wrap">
            <a href="#" class="btn-buy">Buy Now</a>
        </div>
        </div>
        </div>
        @endforeach

        </div>

        </div>
        </section> --}}
        <!-- End Pricing Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title" data-aos="fade-up">
                    <h2>Pricing</h2>
                    <p>Check our Pricing</p>
                </div>

                <div class="row gy-4">

                    @foreach ($dataPricing as $pricing)
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="400">
                        <div class="pricing-item featured">

                            <div class="pricing-header">
                                <h3>{{ $pricing->judul }}</h3>
                                {{-- <h4>IDR {{ $pricing->harga }}</span></h4> --}}
                <h4><sup>IDR</sup>{{ $pricing->harga }}<span> / month</span></h4>
                            </div>

                            <ul>
                                <li><span class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                        At facilis reiciendis provident fugit voluptates consequuntur, blanditiis, nobis
                                        inventore sapiente consequatur iste. Id voluptas ipsa impedit voluptatem
                                        aspernatur nobis animi inventore repudiandae numquam expedita earum culpa
                                        voluptatibus harum, fugiat eius necessitatibus, magnam est, molestiae sequi
                                        veritatis dolore cupiditate. Ut, ab laboriosam?</span>
                                </li>
                            </ul>

                            <div class="text-center mt-auto">
                                <a href="#" class="buy-btn">Buy Now</a>
                            </div>

                        </div>
                    </div><!-- End Pricing Item -->
                    @endforeach
                </div>

            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>F.A.Q</h2>
                    <p>Frequently Asked Questions</p>
                </div>

                <div class="faq-list">
                    <ul>
                        @foreach ($dataFaq as $faq)
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                data-bs-target="#faq-list-{{ $faq->id }}">{{ $faq->pertanyaan }} <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-{{$faq->id}}" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    {{ $faq->jawaban }}
                                </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </section><!-- End F.A.Q Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                <div class="row">

                    @foreach ($dataContact as $contact)

                    <div class="col-lg-4 mb-5" data-aos="fade-right" data-aos-delay="100">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>{{ $contact->deskripsi_lokasi}}</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{ $contact->alamat_email}}</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>{{ $contact->no_telepon}}</p>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-8">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.1790425199783!2d106.76934431485515!3d-6.3708709953899705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69efacf4ec9761%3A0xe193631df084d4ed!2sPRIMAGO%20Islamic%20Boarding%20School%20di%20Depok!5e0!3m2!1sid!2sid!4v1646831952249!5m2!1sid!2sid"
                            width="100%" height="310" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    @endforeach

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Bimbel Primago</h3>
                            <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam
                                    excepturi quod.</em></p>
                            <p>
                                Kawasan Palem Ganda Asri, Blok A2 No. 1, <br>
                                Meruyung, Limo, Kota Depok, Jawa Barat<br><br>
                                <strong>Telepon :</strong> 0896-0282-2094<br>
                                <strong>Email :</strong> primagoschool@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="https://twitter.com/bimbelPRIMAGO" class="twitter" target="_blank"><i
                                        class="bx bxl-twitter"></i></a>
                                <a href="https://web.facebook.com/BimbelMasukGontor?_rdc=1&_rdr" class="facebook"
                                    target="_blank"><i class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/bimbelprimago/" class="instagram" target="_blank"><i
                                        class="bx bxl-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UCholBpqqBBc8ZvM95KbZePg" class="youtube"
                                    target="_blank"><i class="bx bxl-youtube"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>link</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#gallery">Gallery</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#team">Team</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Pricing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Tour & Travel</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Internship</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; 2022 <strong><span>Bimbel Primago</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by Primago
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{asset('landing_page/assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{asset('landing_page/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('landing_page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('landing_page/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('landing_page/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('landing_page/assets/js/main.js')}}"></script>

    @stack('script')

</body>

</html>