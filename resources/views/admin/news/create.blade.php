@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="nbd-section">
            <div class="nbd-section-header">
                <h1>Post a News</h1>
            </div>
            <div class="nbd-section-body">
                {!! Form::open(['method' => 'post', 'route' => 'admin.news.create']) !!}

                @include('forms.news')

                {!! Form::submit('Post', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection