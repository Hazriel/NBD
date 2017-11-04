@extends('layouts.app')

@section('content')
    <div class="nbd-section">
        <div class="nbd-section-header">
            <h1>Create Topic</h1>
        </div>
        <div class="nbd-section-body">
            {!! Form::model($topic, ['method' => 'post', 'route' => ['forum.topic.update', $topic->id]]) !!}
            <div class="form-group">
                {!! Form::label('title' ,'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('message', 'Message') !!}
                {!! Form::textarea('message', $firstPost->message, ['class' => 'form-control']) !!}
            </div>
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
