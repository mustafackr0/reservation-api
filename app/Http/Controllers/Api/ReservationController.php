<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        return Reservation::with(['hotel', 'room'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'guest_count' => 'required|integer|min:1',
        ]);

        $room = Room::findOrFail($request->room_id);

        if ($room->available_count < 1) {
            return response()->json(['message' => 'No available rooms left'], 400);
        }

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'hotel_id' => $request->hotel_id,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'guest_count' => $request->guest_count,
            'status' => 'active',
        ]);

        $room->decrement('available_count');

        return response()->json($reservation, 201);
    }

    public function cancel($id)
    {
        $reservation = Reservation::where('user_id', Auth::id())->findOrFail($id);

        $reservation->update(['status' => 'cancelled']);

        // opsiyonel: odayı tekrar müsait yap
        $reservation->room->increment('available_count');

        return response()->json(['message' => 'Reservation cancelled']);
    }
}
