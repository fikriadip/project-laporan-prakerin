@extends('partial.master_guest')

@section('title_web')
About - Bimbel Primago
@endsection

@section('page-header-inner')
<div class="row d-lg-flex align-items-lg-end">
    <div class="col-lg-6">
        <div class="page-header-content c-white">
            <h1>About Us</h1>
            <ul>
                <li>
                    <a href="{{ route('guest.home') }}" class="link-underline">
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <i class="las la-angle-right"></i>
                    <a href="{{ route('guest.about') }}" class="link-underline">
                        <span>About</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection


@section('content')
<!--
    about section - start
    -->
<div class="about-section">
    <div class="about-section-wrapper">
        <div class="container">
            <!--
            first half - start
            -->
            <div class="row">
                @foreach ($introduction as $data)
                <div class="col-lg-6 offset-lg-0 order-lg-1 col-md-8 offset-md-2 col-10 offset-1 order-2">
                    <div class="about-section-content c-grey">
                        <div class="section-heading">
                            <div class="sub-heading c-purple upper ls-1">
                                <i class="las la-user-circle"></i>
                                <h5>introduction</h5>
                            </div>
                            <div class="main-heading c-dark">
                                <h1>{{ $data->title }}</h1>
                            </div>
                        </div>
                        <p class="paragraph-big">{{ $data->heading }}</p>
                        <p>{{ $data->paragraf }}</p>
                        <p>{{ $data->content }}</p>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-0 order-lg-2 col-md-8 offset-md-2 col-10 offset-1 order-1">
                    <div class="about-section-image">
                        <div class="pattern-image pattern-image-1">
                            <div class="pattern-image-wrapper">
                                <img class="drop-shadow-1"
                                    src="{{ "data:image/" . $data->imageType . ";base64," . $data->photo }}"
                                    style="width: 500px; height: 450px;" alt="image">
                                <div class="background-pattern background-pattern-radius drop-shadow-1">
                                    <div class="background-pattern-img background-loop"
                                        style="background-image: url({{asset('guest/assets/images/patterns/pattern.jpg')}});">
                                    </div>
                                    <div class="background-pattern-gradient"></div>
                                </div>
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
about section - end
-->

<!--
team section - start
-->
<div class="team">
    <div class="team-wrapper">
        <div class="team-inner">
            <div class="container">
                <!--
                team section heading - start
                -->
                <div class="row">
                    <div class="col">
                        <div class="section-heading center c-white">
                            <div class="sub-heading upper ls-1">
                                <i class="las la-tags"></i>
                                <h5>our team</h5>
                            </div>
                            <div class="main-heading">
                                <h1>Meet the creatives.</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                team section heading - end
                -->
            </div>
            <div class="container team-slider-container">
                <!--
                team slider - start
                -->
                <div class="row">
                    <div class="col">
                        <div class="team-slider">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                    <!--
                                    team slide - start
                                    -->
                                    @foreach ($team as $data)
                                    <div class="swiper-slide">
                                        <div class="team-single drop-shadow-team-2">
                                            <div class="team-single-wrapper">
                                                <div class="image">
                                                    <div class="image-wrapper">
                                                        <div class="image-inner">
                                                            <img src="{{ "data:image/" . $data->imageType . ";base64," . $data->photo }}"
                                                                class="rounded-circle" alt="team-member"
                                                                style="width: 199px; height: 199px;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3>{{ $data->name }}</h3>
                                                <p>{{ $data->position }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--
                                    team slide - end
                                    -->
                                </div>
                            </div>
                            <div class="team-slider-navigation slider-navigation">
                                <div class="team-slider-navigation-prev">
                                    <i class="las la-long-arrow-alt-left"></i>
                                </div>
                                <div class="team-slider-navigation-next">
                                    <i class="las la-long-arrow-alt-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                team slider - end
                -->
            </div>
        </div>
        <div class="background-pattern background-pattern-1">
            <div class="background-pattern-img background-loop"
                style="background-image: url({{asset('guest/assets/images/patterns/pattern.jpg')}});"></div>
            <div class="background-pattern-gradient"></div>
            <div class="background-pattern-bottom">
                <div class="image"
                    style="background-image: url({{asset('guest/assets/images/patterns/pattern-1.jpg')}})"></div>
            </div>
        </div>
    </div>
</div>
<!--
team section - end
-->
@endsection