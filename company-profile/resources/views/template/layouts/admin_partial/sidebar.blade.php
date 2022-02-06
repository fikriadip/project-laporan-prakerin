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
		                        <i class="fas fa-users"></i>
		                        <p>Data Home</p>
		                    </a>
		                </li>

		                {{-- <li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.petugas' ) || Route::currentRouteNamed( 'petugas.tambah' ) || Route::currentRouteNamed( 'edit.petugas' ) ?  'active' : '' }}">
		                    <a href="{{route('data.petugas')}}">
		                        <i class="fas fa-user-tie"></i>
		                        <p>Data Petugas</p>
		                    </a>
		                </li>

		                <li
		                    class="nav-item {{ Route::currentRouteNamed( 'petugas.berita.index' ) || Route::currentRouteNamed( 'detail.petugas.berita' ) ?  'active' : '' }}">
		                    <a href="{{route('petugas.berita.index')}}">
		                        <i class="fas fa-newspaper"></i>
		                        <p>Data Berita</p>
		                    </a>
		                </li>

		                <li class="nav-section">
		                    <span class="sidebar-mini-icon">
		                        <i class="fa fa-ellipsis-h"></i>
		                    </span>
		                    <h4 class="text-section">Main</h4>
		                </li>

		                <li
		                    class="nav-item {{ Route::currentRouteNamed( 'data.pengaduan' ) ||  Route::currentRouteNamed( 'getEntri' ) || Route::currentRouteNamed( 'show.pengaduan' ) ?  'active' : '' }}">
		                    <a href="{{route('data.pengaduan')}}">
		                        <i class="fas fa-inbox"></i>
		                        <p>Verifikasi Laporan</p>
		                    </a>
		                </li>

		                <li
		                    class="nav-item {{ Route::currentRouteNamed( 'petugas.berita.index' ) || Route::currentRouteNamed( 'petugas.berita.create' ) || Route::currentRouteNamed( 'detail.petugas.berita' ) || Route::currentRouteNamed( 'edit.petugas.berita' ) ?  'active' : '' }}">
		                    <a href="{{route('petugas.berita.index')}}">
		                        <i class="fas fa-newspaper"></i>
		                        <p>Data Berita</p>
		                    </a>
		                </li>

		                <li class="nav-section">
		                    <span class="sidebar-mini-icon">
		                        <i class="fa fa-ellipsis-h"></i>
		                    </span>
		                    <h4 class="text-section">Masyarakat</h4>
		                </li>

		                <li
		                    class="nav-item {{ Route::currentRouteNamed( 'laporan.pengaduan' ) || Route::currentRouteNamed( 'laporan.pengaduan.detail' ) ?  'active' : '' }}">
		                    <a href="{{route('laporan.pengaduan')}}">
		                        <i class="fas fa-file-alt"></i>
		                        <p>Laporan Pengaduan</p>
		                    </a>
		                </li>

		                <li
		                    class="nav-item {{ Route::currentRouteNamed( 'laporan.masyarakat' ) || Route::currentRouteNamed( 'laporan.masyarakat.detail' ) ?  'active' : '' }}">
		                    <a href="{{route('laporan.masyarakat')}}">
		                        <i class="fas fa-user-friends"></i>
		                        <p>Laporan Masyarakat</p>
		                    </a>
		                </li>

		                <li
		                    class="nav-item {{ Route::currentRouteNamed( 'laporan.masyarakat.feedback' ) || Route::currentRouteNamed( 'laporan.masyarakat.detail' ) ?  'active' : '' }}">
		                    <a href="{{route('laporan.masyarakat.feedback')}}">
		                        <i class="fas fa-comments"></i>
		                        <p>Umpan Balik Masyarakat</p>
		                    </a>
		                </li>  --}}
		            </ul>

		        </div>
		    </div>
		</div>