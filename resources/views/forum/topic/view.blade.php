@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>{{ $topic->title }}</h1>
                </div>
                <div class="nbd-section-body posts">
                    <table class="table table-bordered posts-table">
                        <thead>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr class="post">
                                <td width="25%" class="owner-info">
                                    <img class="avatar-small border-rounded" src="{{ asset('storage/' . $post->owner->avatar) }}" alt="Avatar"><br>
                                    <h4>{{ $post->owner->username }}</h4>
                                    on {{ date_format($post->created_at, 'd/m/Y') }},
                                    at {{ date_format($post->created_at, 'H:i') }}
                                </td>
                                <td class="message">
                                    {!! $post->message !!}
                                    <div class="post-actions">
                                        {{-- Try to make this clean --}}
                                        @if (Auth::user()->canUpdatePost($post))
                                        <a href="{{ route('forum.post.update', $post) }}"><button class="btn btn-post-action"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
                                        @endif
                                        @if (Auth::user()->canDeletePost($post))
                                        <a href="#"><button class="btn btn-post-action"><span class="glyphicon glyphicon-trash"></span> Delete</button></a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="post-links">{{ $posts->links() }}</div>
                    @if (Auth::user()->hasPermissionPower('post_create_power', $topic->forum->required_post_create_power))
                    <div class="text-editor">
                        {!! Form::open(['method' => 'post', 'route' => ['forum.topic.newPost', $topic->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('message', 'Message') !!}
                            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Answer', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    @else
                        <p>You cannot post in this topic.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset("ckeditor/ckeditor.js") }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('message');
    </script>
@endsection