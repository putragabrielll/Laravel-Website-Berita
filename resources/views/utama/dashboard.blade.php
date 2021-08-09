@extends('layouts.default')
@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
				<h5 class="text-white op-7 mb-2">Konfrens Jawa Barat</h5>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="fas fa-users"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">User</p>
								<h4 class="card-title">{{ $user_total }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small">
								<i class="far fa-newspaper"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Article</p>
								<h4 class="card-title">{{ $artikel_total }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small">
								<i class="fas fa-tags"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Kategori</p>
								<h4 class="card-title">{{ $kategori_total }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small">
								<i class="fas fa-file-video"></i>

							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Video</p>
								<h4 class="card-title">{{ $vidio }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@if (auth()->user()->level=="admin")
		<div class="row">
			<div class="col-md-4">
				<div class="card full-height">
					<div class="card-header">
						<div class="card-head-row">
							<div class="card-title">Draft Materi Video</div>
						</div>
					</div>
					<!-- untuk manggil data materi di dashboard -->
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Gambar</th>
										<th>Judul</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($materi as $row)
										<tr>
											<td><img src="{{ asset('uploads/' . $row->gambar_materi) }}" width="50"></td>
											<td>{{ $row->judul_materi }}</td>
											<td>
												@if ($row->is_active == '1')
													<span class="badge badge-success">Active</span>
												@else
													<span class="badge badge-danger">Draft</span>
												@endif
											</td>
											<td><a href="{{ route('materi.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></td>
										</tr>
									@empty
										<td colspan="3" class="text-center">Data Masih Kosong !!!</td>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-4">
				<div class="card full-height">
					<div class="card-header">
						<div class="card-head-row">
							<div class="card-title">Draft Playlist Video</div>
						</div>
					</div>
					<!-- untuk manggil data playlist di dashboard -->
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Gambar</th>
										<th>Judul</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($playlist as $row)
										<tr>
											<td><img src="{{ asset('uploads/' . $row->gambar_playlist) }}" width="50"></td>
											<td>{{ $row->judul_playlist }}</td>
											<td>
												@if ($row->is_active == '1')
													<span class="badge badge-success">Active</span>
												@else
													<span class="badge badge-danger">Draft</span>
												@endif
											</td>
											<td><a href="{{ route('playlist.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></td>
										</tr>
									@empty
										<td colspan="3" class="text-center">Data Masih Kosong !!!</td>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card full-height">
					<div class="card-header">
						<div class="card-head-row">
							<div class="card-title">Draft Artikel</div>
						</div>
					</div>
					<!-- untuk manggil data artikel di dashboard -->
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Gambar</th>
										<th>Judul</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($artikel as $row)
										<tr>
											<td><img src="{{ asset('uploads/' . $row->gambar_artikel) }}" width="50"></td>
											<td>{{ $row->judul }}</td>
											<td>
												@if ($row->is_active == '1')
													<span class="badge badge-success">Active</span>
												@else
													<span class="badge badge-danger">Draft</span>
												@endif
											</td>
											<td><a href="{{ route('artikel.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a></td>
										</tr>
									@empty
										<td colspan="4" class="text-center">Data Masih Kosong !!!</td>
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card full-height">
					<div class="card-header">
						<div class="card-head-row">
							<div class="card-title">Artikel Terakhir</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Artikel</th>
										<th>Kategori</th>
										<th>Author</th>
										<th>Status</th>
										<th>Gambar</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1 ?>
									@forelse ($last_artikel as $row)
									<tr>
										<!-- <td>{{ $row->id }}</td> -->
										<td>{{ $no++ }}</td>
										<td>{{ $row->judul }}</td>
										<!-- kategori ini berada di ArtikelController -->
										<td>{{ $row->kategori->nama_kategori }}</td>
										<!-- users ini berada di ArtikelController -->
										<td>{{ $row->users->name }}</td>
										<td>
											@if ($row->is_active == '1')
												<span class="badge badge-success">Active</span>
											@else
												<span class="badge badge-danger">Draft</span>
											@endif
										</td>
										<td><img src="{{ asset('uploads/' . $row->gambar_artikel) }}" width="100"></td>
										<td>
											<a href="{{ route('artikel.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="7" class="text-center">Data Masih Kosong !!!</td>
									</tr>
									@endforelse
									
								</tbody>
							</table>
							<!-- Paginate Untuk Next datanya -->
							{{ $last_artikel->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	@elseif (auth()->user()->level=="user")
		<div class="row">
			<div class="col-md-12">
				<div class="card full-height">
					<div class="card-header">
						<div class="card-head-row">
							<div class="card-title">Artikel Terbaru</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Artikel</th>
										<th>Kategori</th>
										<th>Author</th>
										<th>Gambar</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1 ?>
									@forelse ($terbaru_artikel as $row)
									<tr>
										<!-- <td>{{ $row->id }}</td> -->
										<td>{{ $no++ }}</td>
										<td>{{ $row->judul }}</td>
										<!-- kategori ini berada di ArtikelController -->
										<td>{{ $row->kategori->nama_kategori }}</td>
										<!-- users ini berada di ArtikelController -->
										<td>{{ $row->users->name }}</td>
										<td><img src="{{ asset('uploads/' . $row->gambar_artikel) }}" width="100"></td>
									</tr>
									@empty
									<tr>
										<td colspan="5" class="text-center">Data Masih Kosong !!!</td>
									</tr>
									@endforelse
								</tbody>
							</table>
							<!-- Paginate Untuk Next datanya -->
							{{ $terbaru_artikel->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif

</div>
@endsection
