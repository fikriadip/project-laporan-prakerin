<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="#8700f5">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title_web')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('template_login/img/favicon.png') }}" />

    <!-- Fonts and icons -->
    <script src="{{asset('template_admin/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('template_admin/assets/css/fonts.min.css') }}">
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands", "simple-line-icons"
                ]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('template_admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template_admin/assets/css/atlantis.min.css')}}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('template_admin/assets/css/demo.css')}}">


    @stack('link')
</head>

<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="#" class="logo">
                    {{-- <img src="{{ asset('template_admin/assets/img/logoprimago.png') }}" alt="navbar brand"
                    class="navbar-brand"> --}}
                    {{-- <div class="navbar-brand text-white">SIAKAD</div> --}}
                    <h2 class="font-weight-bold text-white m-3">PRIMAGO</h2>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            @include('partial.layouts.navbar')
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        @include('partial.layouts.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content" id="content">
                @yield('dashboard')
                <div class="page-inner">
                    <div class="page-header mb-5">
                        <h4 class="page-title">@yield('title_content')</h4>
                        @yield('breadcrumbs')
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="staticBackdropLabel">Yakin Ingin Keluar?
                    </h5>
                    <button class="close text-danger" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout di bawah ini jika siap untuk mengakhiri sesi saat ini.
                    Pilih Cancel jika tidak ingin mengakhiri sesi.</div>
                <div class="modal-footer">

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn mr-2" type="submit" data-dismiss="modal"
                            style="background-color: #1572e8; color: #fff;"><i
                                class="fas fa-window-close has-icon mr-2 text-white"></i>Cancel</button>
                        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                    this.closest('form').submit();"><i class="fa fa-power-off has-icon mr-2"></i>Logout</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <!-- Axios -->
    <script src="{{asset('js/api.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.js')}}"></script>

    <!--   Core JS Files   -->
    <script src="{{asset('template_admin/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('template_admin/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('template_admin/assets/js/core/bootstrap.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('template_admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{asset('template_admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}">
    </script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('template_admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


    <!-- Chart JS -->
    <script src="{{asset('template_admin/assets/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('template_admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset('template_admin/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('template_admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('template_admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{asset('template_admin/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('template_admin/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

    @include('sweetalert::alert')

    <!-- Sweet Alert -->
    <script src="{{asset('template_admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Atlantis JS -->
    <script src="{{asset('template_admin/assets/js/atlantis.min.js')}}"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    {{-- <script src="{{asset('template_admin/assets/js/setting-demo.js')}}"></script>
    <script src="{{asset('template_admin/assets/js/demo.js')}}"></script> --}}

    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function () {
                    $("#previewImg").attr("src", reader.result);
                };
                reader.readAsDataURL(file);
            }
        }

        const contentEle = document.getElementById("content");
        const searchInput = document.getElementById("searchInput");
        const foundEle = document.getElementById('found')
        const searchBtn = document.getElementById("searchBtn");
        const positionEle = document.getElementById('position')
        const totalEle = document.getElementById('total')
        const highlightsEle = document.getElementsByClassName('highlight')
        const originalString = contentEle.innerHTML //original content

        function highlight(element, originalString, search) {
            if (search.length > 0) {
                let regex = new RegExp(search, "gi");
                let newString = originalString.replace(regex, "<span class='highlight'> " + search + "</span>")
                element.innerHTML = newString
            } else {
                //tidak mencari apapun
                element.innerHTML = originalString
            }
        }

        function foundWord() {
            if (highlightsEle.length > 0) {
                foundEle.style.display = 'inline';
                totalEle.innerText = highlightsEle.length //jumlah kata yg di temukan
                indicator(1) //default set indicator 1
            } else {
                foundEle.style.display = 'none';
            }
        }

        function indicator(currentPosition) {
            if (currentPosition > highlightsEle.length || currentPosition == 0) {
                return false; //kalau di akhir atau di awal pencarian tidak bisa next atau prev lagi
            }

            removeCurrentIndicator()

            highlightsEle[currentPosition - 1].id = currentPosition
            highlightsEle[currentPosition - 1].classList.add('active');
            positionEle.innerText = currentPosition
            window.location.hash = '#' + currentPosition //move location
        }

        function prev() {
            indicator(parseInt(positionEle.innerText) - 1)
        }

        function next() {
            indicator(parseInt(positionEle.innerText) + 1)
        }

        function removeCurrentIndicator(currentPosition) {
            if (highlightsEle[parseInt(positionEle.innerText) - 1]) {
                highlightsEle[parseInt(positionEle.innerText) - 1].classList.remove('active');
            }
        }

        searchBtn.addEventListener("click", function () {
            highlight(content, originalString, searchInput.value)
            foundWord() //hitung jumlah kata yang di temukan
        });
    </script>

    @stack('script')
</body>

</html>