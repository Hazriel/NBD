@foreach($users as $user)
    <tr>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->roles->implode('name', ',') }}</td>
        <td>
            <a href="{{ route('admin.user.update', $user) }}"><button type="button" class="btn btn-info">Edit <span class="glyphicon glyphicon-wrench"></span></button></a>
            <a href="#"><button type="button" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash"></span></button></a>
        </td>
    </tr>
@endforeach

