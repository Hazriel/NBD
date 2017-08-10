@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="nbd-section">
            <div class="nbd-section-header">
                <h1>Update Profile</h1>
            </div>
            <div class="nbd-section-body">
                {!! Form::model($user, ['method' => 'post', 'route' => ['user.update', $user->id], 'files' => true]) !!}
                @include('forms.user.update')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection