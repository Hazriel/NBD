<div class="form-group">
    {!! Form::label('title', 'Title :') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('display_order', 'Display order :') !!}
    {!! Form::number('display_order', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('required_view_power', 'Required View Power :') !!}
    {!! Form::number('required_view_power', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('required_modify_power', 'Required Modify Power :') !!}
    {!! Form::number('required_modify_power', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('required_delete_power', 'Required Delete Power :') !!}
    {!! Form::number('required_delete_power', null, ['class' => 'form-control']) !!}
</div>
