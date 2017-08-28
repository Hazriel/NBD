<div class="form-group">
    {!! Form::label('name', 'Name :') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug :') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description :') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-inverted">
            <thead>
            <tr>
                <th width="200">Category</th>
                <th>Permissions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $access => $permission)
                <tr>
                    <td>{{ $access }}</td>
                    <td>
                        @foreach($permission as $p)
                            <input id="{{ camel_case($access . $p['access']) }}" type="checkbox" name="permissions[{{ strtolower($access . '.' . $p['access']) }}]" @if(isset($role) && $role->hasPermission(strtolower($access . '.' . $p['access']))) checked @endif><label for="{{ camel_case($access . $p['access']) }}"><span data-tooltip aria-haspopup="true" class="has-tip" title="{{ $p['description'] }}">{{ preg_replace('/(?<!\ )[A-Z]/', ' $0', $p['access']) }}</span></label>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        {!! Form::label('category_view_power', 'Category View Power') !!}
        {!! Form::number('category_view_power', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('forum_view_power', 'Category View Power') !!}
        {!! Form::number('forum_view_power', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        {!! Form::label('post_create_power', 'Post Create Power') !!}
        {!! Form::number('post_create_power', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('post_update_power', 'Post Update Power') !!}
        {!! Form::number('post_update_power', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('post_delete_power', 'Post Update Power') !!}
        {!! Form::number('post_delete_power', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        {!! Form::label('comment_create_power', 'Comment Create Power') !!}
        {!! Form::number('comment_create_power', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('comment_update_power', 'Comment Update Power') !!}
        {!! Form::number('comment_update_power', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('comment_delete_power', 'Comment Update Power') !!}
        {!! Form::number('comment_delete_power', null, ['class' => 'form-control']) !!}
    </div>
</div>
