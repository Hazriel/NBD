@extends('misc.simple-message')

@section('title')
    You must verify your email
@endsection

@section('message')
    <p>An email has been sent to your mailbox. You must click the link in the mail.</p>
    <p>If you didn't receive any email, we'll send you one again if you click <a href="{{ route('resend-mail') }}">here</a>.</p>
@endsection

