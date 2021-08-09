@extends('layouts.default')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Data Materi</div>
                        <a href="{{ route('penulis_materi.create') }}" class="btn btn-primary btn-sm ml-auto">
                            <i class="fas fa-plus"></i>&nbsp;
                            Tambah Materi
                        </a>
					</div>
				</div>
				<div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-primary">
                            {{ Session('success') }}
                        </div>
                    @endif
					<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Materi Vidio</th>
                                    <th>Slug</th>
                                    <th>Playlist</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @forelse ($materi as $row)
                                <tr>
                                    <!-- <td>{{ $row->id }}</td> -->
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->judul_materi }}</td>
                                    <td>{{ $row->slug }}</td>
                                    <!-- palylist itu adalah nama table di database, judul_playlist adalah field nya -->
                                    <td>{{ $row->playlist->judul_playlist }}</td>
                                    <td>{{ $row->users->name }}</td>
                                    <td>
                                        @if ($row->is_active == '1')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $row->gambar_materi) }}" width="100">
                                    </td>
                                    <td>
                                        <!-- playlist.edit merupakan playlist nya itu mengarah ke kontroller playlist lalu method edit -->
                                        <a href="{{ route('penulis_materi.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('penulis_materi.destroy', $row->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data Masih Kosong !!!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection