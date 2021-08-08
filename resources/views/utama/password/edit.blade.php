@extends('layouts.default')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="col-md-8">
            <div class="card full-height">

                <div class="card-header">
                    <div class="card-head-row">
                    <h4><i class="fa fa-key"></i>&nbsp;&nbsp;Edit Password</h4>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> 
                        <i class="fa fa-coffee"></i>
                        &nbsp;&nbsp;<strong>WARNING!!!</strong>&nbsp;&nbsp;Anda Akan Meng-Update Password.
                    </div>
                    <form method="post" action="{{ route('password.update', auth()->user()->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" name="old_password" id="old_password" class="form-control">
                            @error('old_password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection