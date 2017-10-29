@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered forums">
                <thead>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    @can('view', $category)
                    <tr class="category">
                        <td class="category-title">{{ $category->title }}</td>
                        <td></td>
                    </tr>
                    @foreach($category->forums as $forum)
                        @can('view', $forum)
                        <tr>
                            <td class="forum" width="70%">
                                <a class="forum-link" href="{{ route('forum.view', $forum) }}">{{ $forum->title }}</a>
                                <p class="forum-description">{{ $forum->description }}</p>
                            </td>
                            <td class="forum last-post" width="30%">
                                @if ($forum->last_post_id)
                                    Last post by <a href="{{ route('user.profile', App\Post::find($forum->last_post_id)->owner_id) }}">{{ App\Post::find($forum->last_post_id)->owner->username }}</a><br>
                                    on {{ date_format(App\Post::find($forum->last_post_id)->created_at, 'd/m/Y') }},
                                    at {{ date_format(App\Post::find($forum->last_post_id)->created_at, 'H:i') }}
                                @else
                                    None
                                @endif
                            </td>
                        </tr>
                        @endcan
                    @endforeach
                    @endcan
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection