<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if (Auth::user()->photo == 'avatar_default.png')
                    <img src="{{asset('images/avatar_default.png')}}" class="avatar-img rounded-circle" loading="lazy"
                        alt="Avatar User">
                    @else
                    <img src="{{ "data:image/" . Auth::user()->imageType . ";base64," . Auth::user()->photo }}"
                        alt="Avatar User" class="avatar-img rounded-circle">
                    @endif
                </div>
                <div class="info">
                    <a>
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level text-capitalize">Administrator</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>

            <ul class="nav nav-primary">

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master</h4>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.user' ) ?  'active' : '' }}">
                    <a href="{{route('data.user')}}">
                        <i class="icon-user"></i>
                        <p>Manage User</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Home</h4>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.hero' ) ?  'active' : '' }}">
                    <a href="{{route('data.hero')}}">
                        <i class="icon-layers"></i>
                        <p>Manage Hero</p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.detail' ) ?  'active' : '' }}">
                    <a href="{{route('data.detail')}}">
                        <i class="icon-information"></i>
                        <p>Manage Detail</p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.deskdetail' ) ?  'active' : '' }}">
                    <a href="{{route('data.deskdetail')}}">
                        <i class="icon-pencil"></i>
                        <p>Manage Deskripsi Detail</p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.video' ) ?  'active' : '' }}">
                    <a href="{{route('data.video')}}">
                        <i class="icon-control-play"></i>
                        <p>Manage Video</p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.testimonial' ) ?  'active' : '' }}">
                    <a href="{{route('data.testimonial')}}">
                        <i class="icon-speech"></i>
                        <p>Manage Testimonial</p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.faq' ) ?  'active' : '' }}">
                    <a href="{{route('data.faq')}}">
                        <i class="icon-bubbles"></i>
                        <p>Manage Faq</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">About</h4>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.introduction' ) ?  'active' : '' }}">
                    <a href="{{route('data.introduction')}}">
                        <i class="icon-paper-clip"></i>
                        <p>Manage Introduction</p>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.team' ) ?  'active' : '' }}">
                    <a href="{{route('data.team')}}">
                        <i class="icon-people"></i>
                        <p>Manage Team</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Contact</h4>
                </li>

                <li class="nav-item {{ Route::currentRouteNamed( 'data.contact' ) ?  'active' : '' }}">
                    <a href="{{route('data.contact')}}">
                        <i class="icon-phone"></i>
                        <p>Manage Contact</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>