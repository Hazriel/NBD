@foreach($users as $user)
    <tr>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->roles->implode('name', ',') }}</td>
        <td>
            <a href="{{ route('admin.user.update', $user) }}"><button type="button" class="btn btn-info">Edit</button></a>
            <a href="#"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
    </tr>
@endforeach

