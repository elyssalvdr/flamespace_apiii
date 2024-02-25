//schedules

@extends('layouts.app')

@section('content')

<div>
    @include('layouts.sidebar')
</div>

<h1>Schedules</h1>

<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Room Number</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Reference Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($schedules as $schedule)
        <tr>
            <td>{{ $schedule->user->name }}</td>
            <td>{{ $schedule->room->room_number }}</td>
            <td>{{ $schedule->start_time }}</td>
            <td>{{ $schedule->end_time }}</td>
            <td>{{ $schedule->reference_number }}</td>
            <td>
                <a href="{{ route('schedules.show', $schedule->id) }}">View</a>
                <a href="{{ route('schedules.edit', $schedule->id) }}">Edit</a>
                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="post">
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