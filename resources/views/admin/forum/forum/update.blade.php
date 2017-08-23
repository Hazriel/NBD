@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Update Forum</h1>
                </div>
                <div class="nbd-section-body">
                    {!! Form::model($forum, ['method' => 'post', 'route' => ['admin.forum.forum.update', $forum->id]]) !!}
                    @include('forms.forum.forum')
                    {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
