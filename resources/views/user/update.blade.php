@extends('layouts.layout')

@section('content')
    <div class="row">
        @if(session()->has('success'))
            <div class="col-lg-12">
                <div class="alert alert-success">
                    <p>{{ session()->get('success') }}</p>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="nbd-section">
            <div class="nbd-section-header">
                <h1>Update Profile</h1>
            </div>
            <div class="nbd-section-body">
                {!! Form::model($user, ['method' => 'post', 'route' => ['user.update', $user->id]]) !!}
                @include('forms.user.update')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection