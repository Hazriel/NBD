@extends('layouts.layout')

@section('content')
    <div class="nbd-section">
        <div class="nbd-section-header">
            @if(Auth::user()->id === $user->id)
                <h1>Your Profile</h1>
            @else
                <h1>{{ $user->username }}'s Profile</h1>
            @endif
        </div>
        <div class="nbd-section-body">
            @can('update', $user)
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('user.update', $user) }}"><button type="button" class="btn btn-success">Edit Profile</button></a>
                    </div>
                </div>
                <br>
            @endcan
            <div class="row">
                <div class="col-lg-4 profile-avatar">
                    <img class="avatar" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                </div>
                <div class="col-lg-8 profile-details">
                    <table>
                        <tr>
                            <td>
                                Username :
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email :
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Birth date :
                            </td>
                            <td>
                                {{ $user->birthdate }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Description :
                            </td>
                            <td>
                                {{ $user->description }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection