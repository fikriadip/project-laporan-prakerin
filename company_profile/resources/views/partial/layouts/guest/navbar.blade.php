<div class="navigation navigation-1">
    <div class="navigation-wrapper">
        <div class="container">
            <div class="navigation-inner">
                <div class="navigation-logo">
                    <a class="logo" href="index.html">
                        <img src="{{asset('guest/assets/images/logo.png')}}" alt="primago-logo">
                    </a>
                    <a class="logo-white" href="index.html">
                        <img src="{{asset('guest/assets/images/logo-white.png')}}" alt="primago-logo">
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
                            style="background-image: url({{asset('guest/assets/images/patterns/pattern.jpg')}});"></div>
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