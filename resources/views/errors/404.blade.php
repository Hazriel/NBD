@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="nbd-section">
            <div class="nbd-section-header">
                <h1>{{ $exception->getMessage() }}</h1>
            </div>
            <div class="nbd-section-body">
                <p>The page you are looking for could not be found.</p>
            </div>
        </div>
    </div>
</div>
@endsection