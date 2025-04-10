<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        return Hotel::with('rooms')->latest()->get();
    }

    public function rooms($id)
    {
        $hotel = Hotel::with('rooms')->findOrFail($id);
        return $hotel->rooms;
    }
}
