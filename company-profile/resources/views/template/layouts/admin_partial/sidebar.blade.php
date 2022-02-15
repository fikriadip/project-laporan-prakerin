		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
		    <div class="sidebar-wrapper scrollbar scrollbar-inner">
		        <div class="sidebar-content">
		            <div class="user">
		                <div class="avatar-sm float-left mr-2">
		                    <img src="{{asset('template_admin/assets/img/avatar.png')}}" alt="..."
		                        class="avatar-img rounded-circle">
		                </div>
		                <div class="info">
		                    <a>
		                        <span>
		                            {{-- {{ $petugas->nama_petugas }} --}}
		                            Alex
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
		                    <h4 class="text-section">Home</h4>
		                </li>

		                <li class="nav-item {{ Route::currentRouteNamed( 'admin.dashboard' ) ?  'active' : '' }}">
		                    <a href="{{route('admin.dashboard')}}">
		                        <i class="fas fa-home"></i>
		                        <p>Dashboard</p>
		                    </a>
		                </li>

		                <li class="nav-section">
		                    <span class="sidebar-mini-icon">
		                        <i class="fa fa-ellipsis-h"></i>
		                    </span>
		                    <h4 class="text-section">Main</h4>
		                </li>

		                <li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.home' ) ?  'active' : '' }}">
		                    <a href="{{route('data.home')}}">
		                        <i class="fas fa-home"></i>
		                        <p>Manage Home</p>
		                    </a>
		                </li>

		                <li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.about' ) ?  'active' : '' }}">
		                    <a href="{{route('data.about')}}">
		                        <i class="fas fa-user-tie"></i>
		                        <p>Manage About</p>
		                    </a>
		                </li>
		                
						<li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.deskripsi.about' ) ?  'active' : '' }}">
		                    <a href="{{route('data.deskripsi.about')}}">
		                        <i class="fas fa-user-tie"></i>
		                        <p>Manage Deskripsi About</p>
		                    </a>
		                </li>
						
						<li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.details' ) ?  'active' : '' }}">
		                    <a href="{{route('data.details')}}">
		                        <i class="fas fa-user-tie"></i>
		                        <p>Manage Details</p>
		                    </a>
		                </li>

		                <li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.team' ) ?  'active' : '' }}">
		                    <a href="{{route('data.team')}}">
		                        <i class="fas fa-user-tie"></i>
		                        <p>Manage Teams</p>
		                    </a>
		                </li>
		                
						<li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.pricing' ) ?  'active' : '' }}">
		                    <a href="{{route('data.pricing')}}">
		                        <i class="fas fa-user-tie"></i>
		                        <p>Manage Pricing</p>
		                    </a>
		                </li>
						
						<li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.faq' ) ?  'active' : '' }}">
		                    <a href="{{route('data.faq')}}">
		                        <i class="fas fa-user-tie"></i>
		                        <p>Manage Faq</p>
		                    </a>
		                </li>
						
						<li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.contact' ) ?  'active' : '' }}">
		                    <a href="{{route('data.contact')}}">
		                        <i class="fas fa-user-tie"></i>
		                        <p>Manage Contact</p>
		                    </a>
		                </li>
		            </ul>

		        </div>
		    </div>
		</div>