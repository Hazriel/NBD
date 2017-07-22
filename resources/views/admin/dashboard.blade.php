@extends('layouts.layout')

@section('content')
    <div class="row">
        @if(session()->has('success'))
            <div class="col-lg-12">
                <div class="alert alert-success">
                    <p>{{ session()->get('success') }}</p>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Menu</h1>
                </div>
                <div class="nbd-section-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a data-toggle="pill" href="#users">Users</a></li>
                        <li><a data-toggle="pill" href="#roles">Roles</a></li>
                        <li><a data-toggle="pill" href="#forums">Forum</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Admin Dashboard</h1>
                </div>
                <div class="nbd-section-body">
                    <div class="tab-content">
                        <div id="users" class="tab-pane fade in active">
                            <p>Users tab content ...</p>
                        </div>
                        <div id="roles" class="tab-pane fade">
                            <a href="{{ route('admin.role.create') }}"><button type="button" class="btn btn-success">Add Role <span class="glyphicon glyphicon-plus"></span></button></a>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->slug }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.role.update', $role) }}"><button type="button" class="btn btn-info">Edit</button></a>
                                            <a href="{{ route('admin.role.delete', $role) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="forums" class="tab-pane fade">
                            <p>Forums tab content ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection