@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered posts">
                <thead>
                </thead>
                <tbody>
                    @foreach($topic->posts as $post)
                        <tr class="post">
                            <td width="25%" class="owner-info">
                                {{ $post->owner->username }}
                            </td>
                            <td class="message">
                                {{ $post->message }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection