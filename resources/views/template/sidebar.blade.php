<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="{{ asset('uploads/' . $user->foto_profile) }}" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							{{auth()->user()->name}}
							<span class="user-level">
								@if (auth()->user()->level=="admin")
									Administrator
								@elseif (auth()->user()->level=="user")
									Penulis
								@endif
							</span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="{{ route('profile.index') }}">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="{{ route('password.index') }}">
									<span class="link-collapse">Edit Password</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			<ul class="nav nav-primary">

				<li class="nav-item active">
					<a href="{{ route('dashboard') }}" class="collapsed">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>

				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Master Data</h4>
				</li>

				<!-- Kategori -->
				<li class="nav-item">
					<a href="{{ route('kategori.index') }}">
						<i class="fas fa-layer-group"></i>
						<p>Kategori</p>
					</a>
				</li>

				<!-- Tags -->
				<!-- <li class="nav-item">
					<a href="{{ route('kategori.index') }}">
						<i class="fas fa-layer-group"></i>
						<p>Tags</p>
					</a>
				</li> -->

				@if (auth()->user()->level=="admin")
					<!-- Artikel -->
					<li class="nav-item">
						<a href="{{ route('artikel.index') }}">
							<i class="fas fa-th-list"></i>
							<p>Artikel</p>
						</a>
					</li>
				@elseif (auth()->user()->level=="user")
					<!-- Artikel -->
					<li class="nav-item">
						<a href="{{ route('penulis_artikel.index') }}">
							<i class="fas fa-th-list"></i>
							<p>Artikel</p>
						</a>
					</li>
				@endif

				@if (auth()->user()->level=="admin")
					<!-- User -->
					<!-- <li class="nav-item">
						<a href="{{ route('kategori.index') }}">
							<i class="fas fa-layer-group"></i>
							<p>User</p>
						</a>
					</li> -->

					<li class="nav-section">
						<span class="sidebar-mini-icon">
							<i class="fa fa-ellipsis-h"></i>
						</span>
						<h4 class="text-section">Master Vidio</h4>
					</li>

					<!-- Playlist -->
					<li class="nav-item">
						<a href="{{ route('playlist.index') }}">
							<i class="fas fa-video"></i>
							<p>Playlist Vidio</p>
						</a>
					</li>

					<!-- Materi Vidio -->
					<li class="nav-item">
						<a href="{{ route('materi.index') }}">
							<i class="fas fa-film"></i>
							<p>Materi Vidio</p>
						</a>
					</li>

					<li class="nav-section">
						<span class="sidebar-mini-icon">
							<i class="fa fa-ellipsis-h"></i>
						</span>
						<h4 class="text-section">Baner & Iklan</h4>
					</li>

					<!-- Slider Banner -->
					<li class="nav-item">
						<a href="{{ route('slide.index') }}">
							<i class="	fas fa-images"></i>
							<p>Slider Banner</p>
						</a>
					</li>

					<!-- Banner Iklan -->
					<li class="nav-item">
						<a href="{{ route('iklan.index') }}">
							<i class="fab fa-adversal"></i>
							<p>Iklan</p>
						</a>
					</li>
				@endif

				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Profile User</h4>
				</li>

				<!-- My Profile -->
				<!-- <li class="nav-item">
					<a href="{{ route('playlist.index') }}">
						<i class="fas fa-video"></i>
						<p>My Profile</p>
					</a>
				</li> -->

				<!-- Untuk LOGOUT -->
				<li class="nav-item">
					<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i class="fas fa-undo"></i>
							<p>{{ __('Logout') }}</p>
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>