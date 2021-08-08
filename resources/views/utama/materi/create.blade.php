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
						<div class="card-title">Form Materi Vidio</div>
                        <a href="{{ route('materi.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i>&nbsp;
                            Back
                        </a>
					</div>
				</div>

				<div class="card-body">
                    <form method="post" action="{{ route('materi.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="judul">Materi Vidio</label>
                            <input type="text" name="judul_materi" class="form-control" placeholder="Enter Judul">
                        </div>

                        <div class="form-group">
                            <label for="link">Link Vidio</label>
                            <p>
                                *requirement embed from link youtube
                            </p>
                            <input type="text" name="link" class="form-control" placeholder="Enter Judul">
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="editor1" class="form-control"> </textarea>
                        </div>

                        <div class="form-group">
                            <label for="playlist">Playlist</label>
                            <select name="playlist_id" class="form-control">
                            @foreach ($playlist as $row)
                                <option value="{{ $row->id }}">{{ $row->judul_playlist }}</option>    
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Materi</label>
                            <input type="file" name="gambar_materi" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">SAVE</button>
                            <button class="btn btn-danger btn-sm" type="reset">RESET</button>
                        </div>
                    </form>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection