@extends('template.master_auth')

@section('title_web')
    Admin Login - Bimbel Primago    
@endsection

@section('content')
<section>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('postlogin') }}" class="sign-in-form">
                    @csrf
                    <h2 class="title">Login Akun</h2>
                    <div class="input-field validate-input @error('email') alert-validate @enderror"
                        data-validate="@error('email')  {{ $message }} @enderror">
                        <span class="icon_focus">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" placeholder="Email" id="email" name="email"
                            value="{{ old('email') }}" />
                        <span class="focus-input100"></span>
                    </div>
                    <div class="input-field validate-input @error('password') alert-validate @enderror"
                        data-validate="@error('password')  {{ $message }} @enderror">
                        <span class="icon_focus">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" placeholder="Password" />
                        <span class="focus-input100"></span>
                    </div>
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                    <input type="submit" class="btn solid" value="LOGIN">
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>ADMIN BIMBEL PRIMAGO</h3>
                    <p>Selamat Datang Di Aplikasi Web Bimbingan Belajar Primago</p>
                </div>
                <img src="{{ asset('template_login/img/login.svg') }}" class="image" alt="Image Login" />
            </div>
        </div>
    </div>
</section>
@endsection