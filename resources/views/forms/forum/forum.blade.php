<div class="form-group">
    {!! Form::label('title', 'Title :') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description :') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('display_order', 'Display Order :') !!}
            {!! Form::number('display_order', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_view_power', 'Required View Power :') !!}
            {!! Form::number('required_view_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_topic_create_power', 'Required Create Topic Power :') !!}
            {!! Form::number('required_topic_create_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_topic_update_power', 'Required Update Topic Power :') !!}
            {!! Form::number('required_topic_update_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_topic_delete_power', 'Required Delete Topic Power :') !!}
            {!! Form::number('required_topic_delete_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_post_create_power', 'Required Create Post Power') !!}
            {!! Form::number('required_post_create_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_post_update_power', 'Required Update Post Power') !!}
            {!! Form::number('required_post_update_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_post_delete_power', 'Required Delete Post Power') !!}
            {!! Form::number('required_post_delete_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
