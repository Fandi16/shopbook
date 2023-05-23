@extends('includes._master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Book</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Book</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create New Book</h3>
                            </div>
                            <!-- /.card-header -->
                            <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Book Name:</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter bookname">
                                    </div>
                                    <div class="form-group">
                                        <label for="categories">Category</label>
                                        <select name="categories" id="categories" class="form-control">
                                            <option value="">--Select Category--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Price">Price:</label>
                                        <input type="text" class="form-control" name="price" placeholder="Enter price">
                                    </div>
                                    <div class="form-group">
                                        <label for="cover">Cover:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="cover"
                                                placeholder="Enter Image">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary swalDefaultSuccess">Submit</button>
                                        <a type="button" class="btn btn-link" href="{{ route('books.index') }}">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('vendors/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendors/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    type: 'success',
                    title: 'Car has been successfully added.'
                })
            });
        });
    </script>
@stop
