<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title_web')</title>
    <link rel="icon" href="{{ asset('template_login/img/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('template_login/css/style.css') }}" />
    @stack('link')
</head>

<body>
    @yield('content')

	<!-- Axios -->
	<script src="{{asset('js/api.js')}}"></script>
	<script src="{{asset('js/axios.min.js')}}"></script>
	<script src="{{asset('js/sweetalert.js')}}"></script>
    <script src="{{ asset('template_login/js/kit_fontawesome.min.js') }}"></script>
    <script src="{{ asset('template_login/js/app.js') }}"></script>
    @include('sweetalert::alert')
    @stack('script')
</body>

</html>