@extends('layouts.dashboard.app')

@section('title', 'Create')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Product</div>
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
                <h2 class="section-title">Product</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

                <div class="row">
                    <div class="col-12  ">
                        <div class="card">
                            <div class="card-header">
                                <h4>Products</h4>
                            </div>
                            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror
                                                
                                            "
                                            value="{{ old('name') }}">
                                        <div class="invalid-feedback">
                                            @error('name')
                                                <div class="">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Stok</label>
                                        <div class="input-group">

                                            <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                                name="stok" value="{{ old('stok') }}">

                                            <div class="invalid-feedback">
                                                @error('stok')
                                                    <div class="">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>
                                        <div class="input-group">

                                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                                name="price" value="{{ old('price') }}">

                                            <div class="invalid-feedback">
                                                @error('price')
                                                    <div class="">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category" class="form-control select2 @error('category') is-invalid @enderror">
                                    
                                            <option selected >Pilih category</option>
                                            <option value="food" {{ old('category') == 'food' ? 'selected' : '' }}>Food
                                            </option>

                                            <option value="drink" {{ old('category') == 'drink' ? 'selected' : '' }}>Drink
                                            </option>

                                            <option value="snack" {{ old('category') == 'snack' ? 'selected' : '' }}>Snack
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('category')
                                                <div class="">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="input-group">

                                            <input id="image" type="file" class="form-control @error('price') is-invalid @enderror"
                                                name="image" multiple>

                                            <div class="invalid-feedback">
                                                @error('image')
                                                    <div class="">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <label>Description</label>
                                        <div class="input-group">

                                            <div class="col-sm-12 ">
                                                <textarea name="description" class="summernote"></textarea>
                                            </div>

                                            <div class="invalid-feedback">
                                                @error('description')
                                                    <div class="">{{ $message }}</div>
                                                @enderror
                                            </div>
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
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
