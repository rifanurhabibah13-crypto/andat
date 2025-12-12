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

        // Calculate duration and total price
        $room = Room::findOrFail($data['room_id']);
        $start = strtotime($data['start_time']);
        $end = strtotime($data['end_time']);
        $hours = ($end - $start) / 3600;
        
        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';
        $data['payment_status'] = 'unpaid';
        $data['total_price'] = $room->price_per_hour * $hours;
        
        $booking = Booking::create($data);

        return redirect()->route('user.booking.history')->with('success', 'Booking berhasil dibuat!');
    }

    public function history()
    {
        $bookings = Booking::with('room', 'user')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('user.booking.history', compact('bookings'));
    }

    // Admin listing
    public function index()
    {
        $bookings = Booking::with('user','room')
            ->orderBy('date', 'desc')
            ->get();
        return view('admin.bookings.index', compact('bookings'));
    }
    
    // Admin update status
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        
        $data = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
            'payment_status' => 'required|in:paid,unpaid',
        ]);
        
        $booking->update($data);
        return redirect()->route('admin.bookings.index')->with('success', 'Status booking berhasil diupdate!');
    }
}
