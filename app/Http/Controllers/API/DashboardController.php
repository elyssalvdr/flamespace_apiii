<?php

namespace App\Http\Controllers\API;

use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $availableRoomsCount = Room::where('status', 'available')->count();
        $reservedRoomsCount = Schedule::where('end_time', '>', now())->count();

        return response()->json([
            'available_rooms' => $availableRoomsCount,
            'reserved_rooms' => $reservedRoomsCount,
        ]);
    }
}