@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered forums">
                <thead>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="category">
                        <td class="category-title">{{ $category->title }}</td>
                        <td></td>
                    </tr>
                    @foreach($category->forums as $forum)
                        <tr>
                            <td class="forum" width="70%"><a class="forum-link" href="{{ route('forum.view', $forum) }}">{{ $forum->title }}</a></td>
                            <td class="forum last-post" width="30%">
                                Last post by <a href="{{ route('user.profile', App\Post::find($forum->last_post_id)->owner_id) }}">{{ App\Post::find($forum->last_post_id)->owner->username }}</a>
                                on {{ date_format(App\Post::find($forum->last_post_id)->created_at, 'd/m/Y') }},
                                at {{ date_format(App\Post::find($forum->last_post_id)->created_at, 'H:i') }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection