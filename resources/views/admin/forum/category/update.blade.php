@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="nbd-section">
                <div class="nbd-section-header">
                    <h1>Update Category</h1>
                </div>
                <div class="nbd-section-body">
                    {!! Form::model($category, ['method' => 'topic', 'route' => ['admin.forum.category.update', $category->id]]) !!}
                    @include('forms.forum.category')
                    {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
