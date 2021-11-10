<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Request $req){
        $reservation_data = json_decode($req->getContent());
    }
}
