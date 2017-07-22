@extends('layouts.layout')

@section('content')
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
                            <table>

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