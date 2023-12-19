@extends('layouts.dashboard.app')

@section('title', 'Products')

@push('style')
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="d-flex align-items-center ">
                    <h1>Products</h1>
                    <div class="ml-3">
                        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-primary text-white text-decoration-none">Add
                            product</a>
                    </div>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Products</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @if (session('Success'))
                            

                            <div class="alert alert-success  alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close"
                                        data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    {{ session('Success') }}.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <h2 class="section-title">Products</h2>

                <p class="section-lead">
                    We use 'DataTables' made by @SpryMedia. You can check the full documentation <a
                        href="https://datatables.net/">here</a>.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Products</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Stok</th>
                                            <th>Price</th>
                                            <th>created_At</th>
                                            <th>Action</th>
                                        </tr>
                                        @forelse ($products as $item)
                                            <tr>

                                                {{-- <td>Laravel 5 Tutorial: Introduction
                                                <div class="table-links">
                                                    <a href="#">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="#">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#"
                                                        class="text-danger">Trash</a>
                                                </div>
                                            </td> --}}
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->stok }}</td>
                                                <td>Rp. {{ number_format($item->price) }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <div class="d-flex items-center ">
                                                        <a href="{{ route('products.edit', $item->id) }}"
                                                        class="px-4 py-2 bg-primary text-white text-decoration-none">Detail</a>

                                                        <form action="{{ route('products.destroy', $item->id) }}" class="ml-2" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                        
                                                        <button type="submit" class="btn btn-danger ">Delete</button>
                                                        </form>
                                                    </div>

                                                    
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Product</td>
                                        </tr>
                                        @endforelse

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $products->withQueryString()->links() }}
                                    {{-- {{ $users->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset() }}"></script> --}}
    {{-- <script src="{{ asset() }}"></script> --}}
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
