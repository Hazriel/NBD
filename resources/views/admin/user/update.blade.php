@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Editing {{ $user->username }}</h1>
                </div>
                <div class="nbd-section-body">
                    {!! Form::model($user, ['method' => 'topic', 'route' => ['admin.user.update', $user->id]]) !!}
                    @include('forms.user.update')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Add to Role</h1>
                </div>
                <div class="nbd-section-body">
                    {!! Form::open(['method' => 'post', 'route' => ['admin.user.addToRole', $user->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('role', 'Role :') !!}
                        {!! Form::select('role', $roles, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @if(isset($userRoles))
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Remove from Role</h1>
                </div>
                <div class="nbd-section-body">
                    {!! Form::open(['method' => 'post', 'route' => ['admin.user.removeFromRole', $user->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('role', 'Role :') !!}
                        {!! Form::select('role', $userRoles, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Remove', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection