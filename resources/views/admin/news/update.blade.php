@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="nbd-section">
            <div class="nbd-section-header">
                <h1>Post a News</h1>
            </div>
            <div class="nbd-section-body">
                {!! Form::model($news, ['method' => 'post', 'route' => ['admin.news.update', $news->id]]) !!}

                @include('forms.news')

                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset("ckeditor/ckeditor.js") }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content');
    </script>
@endsection
