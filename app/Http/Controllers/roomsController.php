<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class roomsController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('user.rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        return view('user.rooms.show', compact('room'));
    }

    // Admin CRUD methods can be added later (create, store, edit, update, destroy)
}
