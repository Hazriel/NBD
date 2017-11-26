@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-inverted">
                <div class="panel-heading">Send me a new mail</div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'post', 'route' => 'resend-mail', 'class' => 'form-horizontal']) !!}
                    @include('forms.resend-mail')
                    <div class="col-md-6 col-md-offset-4">
                        {!! Form::submit('Send me a mail', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection