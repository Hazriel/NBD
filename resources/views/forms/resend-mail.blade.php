<div class="form-group">
    {!! Form::label('username', 'Username :', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('username', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('email', 'Email :', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control', 'required' => true]) !!}
    </div>
</div>
