<div class="form-group">
    {!! Form::label('email', 'Email :') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'disabled' => true]) !!}
</div>
<div class="form-group">
    {!! Form::label('birth_date', 'Birth Date :') !!}
    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
        <input id="birth_date" name="birth_date" type="text" class="form-control" placeholder="{{ \Carbon\Carbon::parse($user->birth_date)->format('d/m/Y') }}"/>
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
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
