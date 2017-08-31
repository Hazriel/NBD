@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Create New Role</h1>
                </div>
                <div class="nbd-section-body">
                    {!! Form::open(['route' => 'admin.role.create', 'method' => 'topic']) !!}
                    @include('forms.role.role')
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection