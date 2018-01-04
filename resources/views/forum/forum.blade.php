@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered topics">
                <thead>
                </thead>
                <tbody>
                <tr class="forum-title">
                    <td class="forum-title-td">
                        {{ $forum->title }}
                    </td>
                    <td class="forum-title-td"></td>
                    <td class="forum-title-td"></td>
                    {{-- FIXME: Add permissions check on this --}}
                    <td class="post-add-button"><a href="{{ route('forum.newTopic', $forum) }}"><button type="button" class="btn btn-success">New Post <span class="glyphicon glyphicon-plus"></span></button></a></td>
                </tr>
                @foreach($topics as $topic)
                    <tr class="topic">
                        <td class="topic-title" width="50%">
                            <a href="{{ route('forum.topic.view', $topic->id) }}">{{ $topic->title}}</a>
                        </td>
                        <td class="topic-owner">
                            By <a href="{{ route('user.profile', $topic->owner->id) }}">{{ $topic->owner->username }}</a>
                        </td>
                        <td class="topic-date">
                            Created on {{ date_format($topic->created_at, 'd/m/Y') }}, at {{ date_format($topic->created_at, 'H:i') }}
                        </td>
                        <td class="topic-last-post" width="20%">
                            @if ($topic->lastPost() != null)
                                Last post by <a href="{{ route('user.profile', $topic->lastPost()['owner_id']) }}">{{ App\User::find($topic->lastPost()['owner_id'])->username }}</a>
                                on {{ date_format($topic->lastPost()['created_at'], 'd/m/Y') }},
                                at {{ date_format($topic->lastPost()['created_at'], 'H:i') }}
                            @else
                                None
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="topic-links">{{ $topics->links() }}</div>
        </div>
    </div>
@endsection