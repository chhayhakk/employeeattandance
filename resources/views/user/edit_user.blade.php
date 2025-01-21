@extends('master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index_user') }}">User List</a></li>
                            <li class="breadcrumb-item active">Update User</li>
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
                                    action="{{ route('update_user') }}"
                                    method="post"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <div class="form-group">
                                        <label for="name">User name</label>
                                        <input
                                            required
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            value="{{ $data->name }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select
                                            class="form-control"
                                            id="gender"
                                            name="gender"
                                        >
                                            <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="phone"
                                            name="phone"
                                            value="{{ $data->phone }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select
                                            class="form-control"
                                            id="role"
                                            name="role"
                                        >
                                            <option
                                                value="admin"
                                                {{ $data->role == 'admin' ? 'selected' : '' }}
                                            >
                                                Admin
                                            </option>
                                            <option
                                                value="employee"
                                                {{ $data->role == 'employee' ? 'selected' : '' }}
                                            >
                                                Employee
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="password"
                                            name="password"
                                        >
                                    </div>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="float-right btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
