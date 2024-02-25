//user

@extends('layouts.app')

@section('content')

<div>
    @include('layouts.sidebar')
</div>

<h1>Users</h1>

<table>
    <thead>
        <tr>
            <th>Student Number</th>
            <th>Email</th>
            <th>Name</th>
            <th>Roles</th>
            <th>Permissions</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->student_number }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->roles }}</td>
            <td>{{ $user->permissions }}</td>
            <td>
                <a href="{{ route('users.show', $user->id) }}">View</a>
                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection