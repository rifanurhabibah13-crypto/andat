<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class roomsController extends Controller
{
    // User and Admin index
    public function index()
    {
        $rooms = Room::all();
        
        // Check if this is an admin route
        if (request()->is('admin/*')) {
            return view('admin.rooms.index', compact('rooms'));
        }
        
        // Otherwise return user view
        return view('user.rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        return view('user.rooms.show', compact('room'));
    }

    // Admin CRUD
    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
        ]);

        Room::create($data);
        return redirect()->route('admin.rooms.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'required|integer|min:1',
            'price_per_hour' => 'required|numeric|min:0',
        ]);

        $room->update($data);
        return redirect()->route('admin.rooms.index')->with('success', 'Ruangan berhasil diupdate!');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Ruangan berhasil dihapus!');
    }
}
