@extends('layouts.mail')

@section('content')
    <p>Thank you for registering to the NBD Website</p>
    <p>Your account needs to be activated. To activate your account please click on the following link :</p>
    <p><a href="{!! $link !!}">{!! $link !!} </a></p>
    <p>If you have any request, question or suggestion please contact Hazriel.</p>
    <p>Greetings,</p>
@endsection

@section('signature')
    NBD Team
@endsection