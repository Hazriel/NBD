@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Delete a News</h1>
                </div>
                <div class="nbd-section-body">
                    Are you sure you want to delete the news '{{ $news->title }}' ?
                    <br>
                    <a href="{{ route('admin.news.delete', [$news->id, 'confirm' => true]) }}">Yes</a>
                    <a href="{{ route('admin.dashboard') }}">No</a>
                </div>
            </div>
        </div>
    </div>
@endsection