<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;

class bookingController extends Controller
{
    public function create(Room $room = null)
    {
        return view('user.booking.create', ['room' => $room]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'service' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';
        $data['payment_status'] = 'unpaid';
        $booking = Booking::create($data);

        return redirect()->route('user.booking.history');
    }

    public function history()
    {
        $bookings = Booking::where('user_id', auth()->id())->get();
        return view('user.booking.history', compact('bookings'));
    }

    // Admin listing
    public function index()
    {
        $bookings = Booking::with('user','room')->get();
        return view('admin.bookings.index', compact('bookings'));
    }
}
