@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Edit Role</h1>
                </div>
                <div class="nbd-section-body">
                    {!! Form::model($role, ['route' => ['admin.role.update', $role->id], 'method' => 'topic']) !!}
                    @include('forms.role.role')
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection