@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Edit Role</h1>
                </div>
                <div class="nbd-section-body">
                    {!! Form::model($role, ['route' => ['admin.role.update', $role->id], 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name :') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'Slug :') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description :') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
                    </div>
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection