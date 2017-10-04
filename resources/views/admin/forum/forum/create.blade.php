@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Create Forum</h1>
                </div>
                <div class="nbd-section-body">
                    {!! Form::open(['method' => 'topic', 'route' => ['admin.forum.forum.create', $category]]) !!}
                    @include('forms.forum.forum')
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection