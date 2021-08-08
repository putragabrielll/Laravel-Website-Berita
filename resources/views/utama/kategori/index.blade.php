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
						<div class="card-title">Data Kategori</div>
                        <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm ml-auto">
                            <i class="fas fa-plus"></i>&nbsp;
                            Tambah Kategori
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
                                    <th>Nama Kategori</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @forelse ($kategori as $row)
                                <tr>
                                    <!-- <td>{{ $row->id }}</td> -->
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nama_kategori }}</td>
                                    <td>{{ $row->slug }}</td>
                                    <td>
                                        @if (auth()->user()->level=="admin")
                                            <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('kategori.destroy', $row->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @elseif (auth()->user()->level=="user")
                                            <button disabled="disabled" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <form action="{{ route('kategori.destroy', $row->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                                <button disabled="disabled" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td  colspan="6" class="text-center">Data Masih Kosong !!!</td>
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