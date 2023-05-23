@extends('includes._master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">User</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
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
                <a href="{{ route('users.create') }}" class="btn btn-primary">Create</a>
            </div>
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Table</h3>
                    </div>
                    <br />
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Alert!</h5>
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-user" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="10%" style="text-align: center;">ID</th>
                                    <th width="10%" style="text-align: center;">Name</th>
                                    <th width="15%" style="text-align: center;">Email</th>
                                    <th width="10%" style="text-align: center;">Roles</th>
                                    <th width="20%" style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm">
                                                Edit </a>
                                            <form class="d-inline" action="{{ route('users.destroy', $user->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Move user {{ $user->name }} to trash?')">
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
            $("#tbl-user").DataTable();
        });
    </script>
@endsection
