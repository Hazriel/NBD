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
            {!! Form::label('required_create_post_power', 'Required Create Post Power :') !!}
            {!! Form::number('required_create_post_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_update_post_power', 'Required Update Post Power :') !!}
            {!! Form::number('required_update_post_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_delete_post_power', 'Required Delete Post Power :') !!}
            {!! Form::number('required_delete_post_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_create_comment_power', 'Required Create Comment Power :') !!}
            {!! Form::number('required_create_comment_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_update_comment_power', 'Required Update Comment Power :') !!}
            {!! Form::number('required_update_comment_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::label('required_delete_comment_power', 'Required Delete Comment Power :') !!}
            {!! Form::number('required_delete_comment_power', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
