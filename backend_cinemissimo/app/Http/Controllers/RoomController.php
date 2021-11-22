<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function detail($id) {
        return Room::find($id);
    }

    public function list() {
        return Room::all();
    }
}
