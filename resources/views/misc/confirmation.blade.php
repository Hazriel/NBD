@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Warning !</h1>
                </div>
                <div class="nbd-section-body">
                    @if(isset($message))
                        <p>{{ $message }}</p>
                    @endif

                    @if(isset($confirmation))
                        <p>{{ $confirmation }}</p>
                    @else
                        <p>Do you want to continue ?</p>
                    @endif
                    <a href="{{ $next }}">Yes</a>
                    <a href="{{ $redirectTo }}">No</a>
                </div>
            </div>
        </div>
    </div>
@endsection
