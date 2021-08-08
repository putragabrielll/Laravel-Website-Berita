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
						<div class="card-title">Iklan <strong><u>{{ $iklan->judul_iklan }}</u></strong></div>
                        <a href="{{ route('iklan.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i>&nbsp;
                            Back
                        </a>
					</div>
				</div>

				<div class="card-body">
                    <form method="post" action="{{ route('iklan.update', $iklan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul Iklan</label>
                            <input type="text" name="judul_iklan" value="{{ $iklan->judul_iklan }}" class="form-control" placeholder="Enter Judul">
                        </div>

                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" name="link" value="{{ $iklan->link }}" class="form-control" placeholder="Enter Link">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $iklan->is_active == '1' ? 'selected' : ''}}>
                                    Publish
                                </option>
                                <option value="0" {{ $iklan->is_active == '0' ? 'selected' : ''}}>
                                    Draft
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Iklan</label>
                            <input type="file" name="gambar_iklan" class="form-control">
                            <br>
                            <label for="gambar">Gambar Saat Ini</label>
                            <br>
                            <img src="{{ asset('uploads/' . $iklan->gambar_iklan) }}" width="200">
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