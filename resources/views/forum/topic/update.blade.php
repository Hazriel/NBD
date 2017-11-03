@extends('layouts.app')

@section('content')
    <div class="nbd-section">
        <div class="nbd-section-header">
            <h1>Create Topic</h1>
        </div>
        <div class="nbd-section-body">
            {!! Form::model($topic, ['method' => 'post', 'route' => ['forum.topic.update', $topic->id]]) !!}
            @include('forms.forum.topic')
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
