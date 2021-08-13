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
						<div class="card-title">Form Slide Banner</div>
                        <a href="{{ route('slide.index') }}" class="btn btn-warning btn-sm ml-auto">
                            <i class="fas fa-undo"></i>&nbsp;
                            Back
                        </a>
					</div>
				</div>

				<div class="card-body">

                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> 
                        <i class="fa fa-bell"></i>
                        &nbsp;&nbsp;*requirement foto 1920 x 930 px.
                    </div>

                    <form method="post" action="{{ route('slide.store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="judul">Judul Slide</label>
                            <input type="text" name="judul_slide" class="form-control" placeholder="Enter Judul">
                        </div>

                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" name="link" class="form-control" placeholder="Enter Link">
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Slide</label>
                            <p>
                                *requirement 1920 x 930 px
                            </p>
                            <input type="file" name="gambar_slide" class="form-control">
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