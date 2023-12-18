@extends('layouts.dashboard.auth')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    @if ($errors->any())
    <div >
        <div class="text-danger">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="name" value="{{ __('Name') }}">Name</label>
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" tabindex="1" required
                        autofocus value="{{ old('name') }}">
                    <div class="invalid-feedback">
                        @error('name')
                            <div class="">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" value="{{ __('Email') }}">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required
                        autofocus value="{{ old('email') }}">
                    <div class="invalid-feedback">
                        @error('email')
                            <div class="">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label" value="{{ __('Password') }}">Password</label>

                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required autocomplete="current-password">
                    
                    <div class="invalid-feedback">
                        @error('password')
                            <div class="">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password_confirmation" class="control-label" value="{{ __('Confirm Password') }}">Confirm Password</label>

                    </div>
                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" tabindex="2" required autocomplete="current-password">
                    
                    <div class="invalid-feedback">
                        @error('password_confirmation')
                            <div class="">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        {{ __('Register') }} 
                    </button>
                </div>
            </form>
            

        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Do You have account? <a href="{{ route('login') }}">Login</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
