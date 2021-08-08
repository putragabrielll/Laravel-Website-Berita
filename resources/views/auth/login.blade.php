@extends('auth.template_login.app')

@section('content')

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('back_login/images/img-01.png') }}" alt="IMG">
                </div>

                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf

                    <span class="login100-form-title">
                        Login Sistem KJB
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input100" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>

                        @error('email')
                            
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input100" name="password" placeholder="Password" required autocomplete="current-password">

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>

                        @error('password')
                            
                        @enderror
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>

                        @if (Route::has('password.request'))
                            <a class="txt2" href="{{ route('password.request') }}">
                                Password?
                            </a>
                        @endif

                    </div>

                    <div class="text-center p-t-136">
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>

@endsection