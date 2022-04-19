@extends('partial.master_guest')

@section('title_web')
Contact - Bimbel Primago
@endsection

@section('page-header-inner')
<div class="row d-lg-flex align-items-lg-end">
    <div class="col-lg-6">
        <div class="page-header-content c-white">
            <h1>Contact Us</h1>
            <ul>
                <li>
                    <a href="{{ route('guest.home') }}" class="link-underline">
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <i class="las la-angle-right"></i>
                    <a href="{{ route('guest.contact') }}" class="link-underline">
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection


@section('content')
<!--
    contact details - start
    -->
<div class="contact-details">
    <div class="contact-details-wrapper">
        <div class="container">
            <!--
                contact details heading - start
                -->
            <div class="row">
                <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <div class="section-heading center width-55">
                        <div class="sub-heading c-purple upper ls-1">
                            <i class="las la-handshake"></i>
                            <h5>get in touch</h5>
                        </div>
                        <div class="main-heading c-dark">
                            <h1>Many ways to reach us today.</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--
                contact details heading - end
                -->
            <!--
                contact details row - start
                -->
            <div class="row gx-5 details-row">
                @foreach ($contact as $data)
                <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <div class="app-feature-single app-feature-single-1">
                        <div class="app-feature-single-wrapper">
                            <div class="icon">
                                <i class="las la-phone-volume"></i>
                            </div>
                            <h3 class="c-dark">Call Us</h3>
                            <p class="c-grey">
                                Phone:
                                <a href="tel:{{ $data->number_phone }}" class="link-underline link-underline-1">
                                    <span>{{ $data->number_phone }}</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <div class="app-feature-single app-feature-single-1">
                        <div class="app-feature-single-wrapper">
                            <div class="icon">
                                <i class="las la-envelope-open"></i>
                            </div>
                            <h3 class="c-dark">Email Us</h3>
                            <p class="c-grey">
                                <a href="mailto:{{ $data->email }}" class="link-underline link-underline-1">
                                    <span>{{ $data->email }}</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
                    <div class="app-feature-single app-feature-single-1">
                        <div class="app-feature-single-wrapper">
                            <div class="icon">
                                <i class="las la-map-marked-alt"></i>
                            </div>
                            <h3 class="c-dark">Find Us</h3>
                            <p class="c-grey">{{ $data->location }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--
                contact details row - end
                -->
        </div>
    </div>
</div>
<!--
    contact details - end
    -->
@endsection