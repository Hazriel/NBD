@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="nbd-section">
            <div class="nbd-section-header">
                <h1>Update Profile</h1>
            </div>
            <div class="nbd-section-body">
                {!! Form::model($user, ['method' => 'topic', 'route' => ['user.update', $user->id], 'files' => true]) !!}
                @include('forms.user.update')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
@endsection