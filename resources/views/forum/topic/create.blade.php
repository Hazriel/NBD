@extends('layouts.layout')

@section('content')
<div class="nbd-section">
    <div class="nbd-section-header">
        <h1>Create Topic</h1>
    </div>
    <div class="nbd-section-body">
        {!! Form::open(['method' => 'post', 'route' => ['forum.newTopic', $forum->id]]) !!}
            @include('forms.forum.topic')
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection