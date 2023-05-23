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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- /.card-header -->
                            <form method="post" action="{{ route('users.update', $id) }}">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Full Name:</lab el>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $users->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Model">Email:</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $users->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="Type">Roles:</label>
                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input {{ $users->roles == '["ADMIN"]' ? 'checked' : '' }} value='["ADMIN"]'
                                                    type="radio" id="admin" name="roles">
                                                <label for="admin">
                                                    ADMIN
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input {{ $users->roles == '["USER"]' ? 'checked' : '' }} value='["USER"]'
                                                    type="radio" id="user" name="roles">
                                                <label for="user">
                                                    USER
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
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
