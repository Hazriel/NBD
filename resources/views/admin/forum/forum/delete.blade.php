@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Delete Forum</h1>
                </div>
                <div class="nbd-section-body">
                    <p>The forums will be archived first before to be deleted.</p>
                    <p>Are you sure you want to delete the '{{ $forum->title }}' forum ?</p>
                    <a href="{{ route('admin.forum.forum.archive', $forum) }}">Yes</a>
                    <a href="{{ route('admin.dashboard') }}">No</a>
                </div>
            </div>
        </div>
    </div>
@endsection
