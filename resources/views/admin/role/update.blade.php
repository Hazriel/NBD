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
                    <div class="row">
                        <table width="100%">
                            <thead>
                            <tr>
                                <th width="200">Permission</th>
                                <th>Enabled</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $access => $permission)
                                <tr>
                                    <td>{{ $access }}</td>
                                    <td>
                                        <label>{{ $access }} Permissions</label>
                                        @foreach($permission as $p)
                                            <input id="{{ camel_case($access . $p['access']) }}" type="checkbox" name="permissions[{{ strtolower($access . '.' . $p['access']) }}]" @if($role->hasPermission(strtolower($access . '.' . $p['access']))) checked @endif><label for="{{ camel_case($access . $p['access']) }}"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{ $p['description'] }}">{{ preg_replace('/(?<!\ )[A-Z]/', ' $0', $p['access']) }}</span></label>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection