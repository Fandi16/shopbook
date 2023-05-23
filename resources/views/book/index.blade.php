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
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
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
        <section class="content">
            <div class="col-md-12 mb-3">
                <a href="{{ route('books.create') }}" class="btn btn-primary">Create</a>
            </div>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Book Table</h3>
                    </div>
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i>
                                Alert!</h5>
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="10%" style="text-align: center;">Cover</th>
                                    <th width="20%" style="text-align: center;">Name Book</th>
                                    <th width="15%" style="text-align: center;">Category</th>
                                    <th width="10%" style="text-align: center;">Price</th>
                                    <th width="20%" style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="shrink">
                                            @if ($book->cover)
                                                <img src="{{ asset('storage/' . $book->cover) }}" width="50px" />
                                            @endif
                                        </td>
                                        <td class="center">{{ $book->name }}</td>
                                        <td class="center">{{ $book->categories->name }}</td>
                                        <td class="center">{{ 'Rp. ' . number_format($book->price, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info btn-sm"> Edit
                                            </a>
                                            <form class="d-inline"
                                                action="{{ route('books.destroy', $book->id) }}"method="POST"
                                                onsubmit="returnconfirm('Move book id= {{ $book->id }} to trash?')">
                                                @csrf
                                                <input type="hidden" value="DELETE" name="_method">
                                                <input type="submit" class="btn btn-danger btn-sm" value="Trash">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('javascript')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
@endsection
