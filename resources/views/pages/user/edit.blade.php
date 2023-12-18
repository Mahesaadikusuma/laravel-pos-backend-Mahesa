@extends('layouts.dashboard.app')

@section('title', 'Edit User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User {{ $user->name }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('user.index') }}">All User</a></div>
                    <div class="breadcrumb-item">Edit User</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    @if ($errors->any())
                        <div>
                            <div class="text-danger">{{ __('Whoops! Something went wrong.') }}</div>

                            <ul class="text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <h2 class="section-title">User {{ $user->name }}</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

                <div class="row">
                    <div class="col-12  ">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit {{ $user->name }} </h4>
                            </div>
                            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror
                                                
                                            "
                                            value="{{ $user->name }}">
                                        <div class="invalid-feedback">
                                            @error('name')
                                                <div class="">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror
                                                
                                            "
                                                value="{{ $user->email }}">
                                            <div class="invalid-feedback">
                                                @error('email')
                                                    <div class="">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </div>
                                            </div>
                                            <input type="password"
                                                class="form-control pwstrength @error('password') is-invalid @enderror"
                                                name="password">
                                            <div class="invalid-feedback">
                                                @error('password')
                                                    <div class="">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            {{-- <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div> --}}

                                            <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ $user->phone }}">

                                            <div class="invalid-feedback">
                                                @error('phone')
                                                    <div class="">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Roles</label>

                                        {{-- <select name="roles" required id="" class="form-control">
                                            <option selected>Open this select menu</option>
                                            <option value="ADMIN">ADMIN</option>
                                            <option value="STAFF">STAFF</option>
                                            <option value="USER">USER</option>
                                         </select> --}}
                                        <select name="roles" class="form-control select2 @error('role') is-invalid @enderror">
                                            <option value={{ $user->roles }} >{{ $user->roles }} / tidak diganti </option>
                                            <option value="ADMIN" {{ old('role') == 'ADMIN' ? 'selected' : '' }}>ADMIN
                                            </option>

                                            <option value="STAFF" {{ old('role') == 'STAFF' ? 'selected' : '' }}>STAFF
                                            </option>

                                            <option value="USER" {{ old('role') == 'USER' ? 'selected' : '' }}>USER
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('role')
                                                <div class="">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <div class=" text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
