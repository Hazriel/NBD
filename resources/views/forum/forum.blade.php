@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered posts">
            <thead>
            </thead>
            <tbody>
                <tr class="forum-title">
                    <td class="forum-title-td">
                        {{ $forum->title }}
                    </td>
                    <td class="post-add-button"><a href="{{ route('forum.newTopic', $forum) }}"><button type="button" class="btn btn-success">New Post <span class="glyphicon glyphicon-plus"></span></button></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection