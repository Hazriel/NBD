@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Delete Category</h1>
                </div>
                <div class="nbd-section-body">
                    <p>Are you sure you want to delete the '{{ $category->title }}' category ?</p>
                    <a href="{{ route('admin.forum.category.delete', $category) }}">Yes</a>
                    <a href="{{ route('admin.dashboard') }}">No</a>
                </div>
            </div>
        </div>
    </div>
@endsection
