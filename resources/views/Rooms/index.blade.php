//rooms

@extends('layouts.app')

@section('content')

<div>
    @include('layouts.sidebar')
</div>

<h1>Rooms</h1>

<table>
    <thead>
        <tr>
            <th>Room Number</th>
            <th>Building</th>
            <th>Capacity</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms as $room)
        <tr>
            <td>{{ $room->room_number }}</td>
            <td>{{ $room->building }}</td>
            <td>{{ $room->capacity }}</td>
            <td>{{ $room->image }}</td>
            <td>{{ $room->status }}</td>
            <td>
                <a href="{{ route('rooms.show', $room->id) }}">View</a>
                <a href="{{ route('rooms.edit', $room->id) }}">Edit</a>
                <form action="{{ route('rooms.destroy', $room->id) }}" method="post">
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