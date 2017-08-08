<div class="form-group">
    {!! Form::label('email', 'Email :') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('birth_date', 'Birth Date :') !!}
    {!! Form::date('birth_date', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password :') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirmation :') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description :') !!}
    {!! form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>
<div class="form-group">
    {!! Form::label('avatar', 'Avatar :') !!}
    {!! Form::file('avatar', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
</div>