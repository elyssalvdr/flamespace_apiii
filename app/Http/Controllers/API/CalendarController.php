<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class CalendarController extends Controller
{
    public function getEvents()
    {
        try {
            $schedules = Schedule::with('user', 'room')->get();

            $events = [];
            foreach ($schedules as $schedule) {
                if ($schedule->user && $schedule->room) {
                    $events[] = [
                        'title' => $schedule->user->name . ' - Room ' . $schedule->room->room_number,
                        'start' => $schedule->start_time,
                        'end' => $schedule->end_time,
                    ];
                }
            }

            return response()->json($events);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
