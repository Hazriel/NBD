@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered forums">
                <thead>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="category">
                        <td class="category-title">{{ $category->title }}</td>
                        <td></td>
                    </tr>
                    @foreach($category->forums as $forum)
                        <tr>
                            <td class="forum" width="70%"><a class="forum-link" href="{{ route('forum.forum', $forum) }}">{{ $forum->title }}</a></td>
                            <td class="forum" width="30%">None</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection