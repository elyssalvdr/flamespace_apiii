<?php

namespace App\Http\Controllers\API;

use App\Models\Room;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }

    public function show($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['error' => 'Room not found'], 404);
        }

        return response()->json($room);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_number' => 'required|unique:rooms',
            'building' => 'required',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|url',
            'status' => 'required|in:available,not available',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $room = Room::create($request->all());

        return response()->json($room, 201);
    }

    public function update(Request $request, $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['error' => 'Room not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'room_number' => 'required|unique:rooms,room_number,' . $id,
            'building' => 'required',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|url',
            'status' => 'required|in:available,not available',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $room->update($request->all());

        return response()->json($room);
    }

    public function destroy($id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['error' => 'Room not found'], 404);
        }

        $room->delete();

        return response()->json(['message' => 'Room deleted successfully']);
    }

    public function filterByBuilding($building)
    {
        $rooms = Room::where('building', $building)->get();

        return response()->json($rooms);
    }
}


