@extends('layouts.app')

@section('content')
    <div class="nbd-section">
        <div class="nbd-section-header">
            <h1>Update Post</h1>
        </div>
        <div class="nbd-section-body">
            {!! Form::model($post, ['method' => 'post', 'route' => ['forum.post.update', $post->id]]) !!}
            @include('forms.forum.post')
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset("ckeditor/ckeditor.js") }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('message');
    </script>
@endsection
