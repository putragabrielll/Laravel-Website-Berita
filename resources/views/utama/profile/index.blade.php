@extends('layouts.default')

@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="col-md-12">
            <div class="card full-height">

                <div class="card-header">
                    <div class="card-head-row">
                    <h4><i class="fa fa-user"></i>&nbsp;&nbsp;My Profile</h4>
                    </div>
                </div>

                <!-- Untuk manggil data profile -->
                <div class="card-body">
                        <div class="center">
                            <div class="text-center">
                            <img src="{{ asset('uploads/' . $user->foto_profile) }}" width="200" class="img-thumbnail" alt="Cinque Terre">
                                <h6>Your Photo Is Now !!!</h6>
                            </div>
                        </div>
                    <div class="row">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>No Hp</td>
                                    <td>:</td>
                                    <td>{{ $user->no_hp }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $user->alamat }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Untuk input Profile -->
    <div class="page-inner mt--5">
        <div class="col-md-12">
            <div class="card full-height">

                <div class="card-header">
                    <div class="card-head-row">
                    <h4><i class="fa fa-pencil-alt"></i>&nbsp;&nbsp;Edit My Profile</h4>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('profile.update', auth()->user()->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ asset('uploads/' . $user->foto_profile) }}" alt="..." class="avatar-img rounded-circle">
                                    <h6>Upload a different photo...</h6>
                                    
                                    <input type="file" name="foto_profile" class="form-control">
                                </div>
                            </div>
                            <!-- right column -->
                            <div class="col-md-9 personal-info">
                                <div class="alert alert-info alert-dismissable">
                                    <a class="panel-close close" data-dismiss="alert">×</a> 
                                    <i class="fa fa-coffee"></i>
                                    &nbsp;&nbsp;<strong>WARNING!!!</strong>&nbsp;&nbsp;Anda Akan Meng-Update Data Diri.
                                </div>
                                <h3>Personal info</h3>
                                <div class="form-group">
                                    <label for="judul">Nama</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter Judul">
                                </div>
                                <div class="form-group">
                                    <label for="judul">No. Hp</label>
                                    <input type="number" name="no_hp" value="{{ $user->no_hp }}" class="form-control" placeholder="Input No Tlp">
                                </div>
                                <div class="form-group">
                                    <label for="judul">E-Mail Address</label>
                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Enter Judul">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Alamat</label>
                                    <textarea type="text" name="alamat" value="{{ $user->alamat }}" class="form-control" placeholder="Enter Alamat">{{ $user->alamat }}</textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="judul">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Password">
                                </div> -->

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection