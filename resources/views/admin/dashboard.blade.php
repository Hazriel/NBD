@extends('layouts.app')

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
                        <li><a data-toggle="pill" href="#news">News</a></li>
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
                            <div class="search-bar">
                                <input id="username" type="text" name="username">
                                <input type="button" value="Search" onclick="searchUser()">
                            </div>
                            <table class="table users">
                                <thead>
                                <tr>
                                    <th width="15%">Name</th>
                                    <th width="25%%">Email</th>
                                    <th width="30%">Roles</th>
                                    <th width="30%">Actions</th>
                                </tr>
                                </thead>
                                <tbody id="user-container">
                                @include('admin.user.list')
                                </tbody>
                            </table>
                            <nav aria-label="user-navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#" onclick="previousPage();">Previous</a></li>
                                    @for($i = 1; $i < $pageCount; $i++)
                                        <li class="page-item"><a class="page-link" href="#" onclick="getUsers({{ $i }});">{{ $i }}</a></li>
                                    @endfor
                                    <li class="page-item"><a class="page-link" href="#" onclick="nextPage();">Next</a></li>
                                </ul>
                            </nav>
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
                                            <a href="{{ route('admin.role.update', $role) }}"><button type="button" class="btn btn-info">Edit <span class="glyphicon glyphicon-wrench"></span></button></a>
                                            <a href="{{ route('admin.role.delete', $role) }}"><button type="button" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash"></span></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="forums" class="tab-pane fade">
                            <a href="{{ route('admin.forum.category.create') }}"><button type="button" class="btn btn-success">Add Category <span class="glyphicon glyphicon-plus"></span></button></a>
                            @foreach($forum_categories as $category)
                                <div class="admin-forum-category">
                                    <table class="admin-category-title">
                                        <tr>
                                            <td>
                                                <h3>{{ $category->title }}</h3>
                                            </td>
                                            <td class="category-actions">
                                                <a href="{{ route('admin.forum.forum.create', $category) }}"><button type="button" class="btn btn-success">New Forum <span class="glyphicon glyphicon-plus"></span></button></a>
                                                <a href="{{ route('admin.forum.category.update', $category) }}"><button type="button" class="btn btn-info">Edit <span class="glyphicon glyphicon-wrench"></span></button></a>
                                                <a href="{{ route('admin.forum.category.warning', $category) }}"><button type="button" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash"></span></button></a>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="admin-forums">
                                        <table class="table">
                                            <tr>
                                                <th>Title</th>
                                                <th>Order</th>
                                                <th>VP</th>
                                                <th>CTP</th>
                                                <th>UTP</th>
                                                <th>DTP</th>
                                                <th>CPP</th>
                                                <th>UPP</th>
                                                <th>DPP</th>
                                                <td>Actions</td>
                                            </tr>
                                            @foreach($category->forums->sortBy('display_order') as $forum)
                                                <tr>
                                                    <td>{{ $forum->title }}</td>
                                                    <td>{{ $forum->display_order }}</td>
                                                    <td>{{ $forum->required_view_power }}</td>
                                                    <td>{{ $forum->required_topic_create_power }}</td>
                                                    <td>{{ $forum->required_topic_update_power }}</td>
                                                    <td>{{ $forum->required_topic_delete_power }}</td>
                                                    <td>{{ $forum->required_post_create_power }}</td>
                                                    <td>{{ $forum->required_post_update_power }}</td>
                                                    <td>{{ $forum->required_post_delete_power }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.forum.forum.update', $forum) }}"><span class="glyphicon glyphicon-cog"></span></a>
                                                        <a href="{{ route('admin.forum.forum.warning', $forum) }}"><span class="glyphicon glyphicon-trash"></span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="news" class="tab-pane fade">
                            <div class="news-action-button">
                                <a href="{{ route('admin.news.create') }}"><button class="btn btn-success">Add a News <span class="glyphicon glyphicon-plus"></span></button></a>
                                {{-- Create a list of already posted news here --}}
                                @foreach($newsList as $news)
                                    <div class="news">
                                        <p>{{ $news->title }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ url('js/admin.js') }}"></script>
    <meta name="_token" content="{!! csrf_token() !!}" />
@endsection