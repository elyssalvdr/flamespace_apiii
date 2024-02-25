//calendar

@extends('layouts.app')

@section('content')

<div>
    @include('layouts.sidebar')
</div>

<h1>Calendar</h1>

<div id="calendar"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            // Customize your FullCalendar options here
            initialView: 'dayGridMonth',
            events: [
                // Define your events here
                @foreach($events as $event)
                        {
                    title: '{{ $event->title }}',
                    start: '{{ $event->start_time }}',
                    end: '{{ $event->end_time }}',
                },
                @endforeach
            ],
        });

        calendar.render();
    });
</script>
@endsection