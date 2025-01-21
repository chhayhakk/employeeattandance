@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/user') }}">User List</a></li>
                            <li class="breadcrumb-item active">Create User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ url('/admin/user') }}">
                                    <button type="button" class="btn btn-secondary">
                                        <i class="fas fa-long-arrow-alt-left"></i>
                                        Back
                                    </button>
                                </a>

                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ route('create_user') }}"
                                    method="post"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">User name</label>
                                        <input
                                            required
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select
                                            class="form-control"
                                            id="gender"
                                            name="gender"
                                        >
                                            <option value="male">Male</option>
                                            <option value="male" selected>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="phone"
                                            name="phone"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select
                                            class="form-control"
                                            id="role"
                                            name="role"
                                        >
                                            <option value="admin">Admin</option>
                                            <option value="employee" selected>Employee</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                            required
                                            type="password"
                                            class="form-control"
                                            id="password"
                                            name="password"
                                        >
                                    </div>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="float-right btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
