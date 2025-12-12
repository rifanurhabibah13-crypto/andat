<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class servicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    // CRUD methods can be added later
}
