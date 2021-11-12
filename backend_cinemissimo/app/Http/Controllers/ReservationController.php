<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Request $req){
        $reservation_data = json_decode($req->getContent());

        $new_reservation = new Reservation();

        $new_reservation->projection_id = $reservation_data->proj_id;
        $new_reservation->name = $reservation_data->name;
        $new_reservation->surname = $reservation_data->surname;
        $new_reservation->mail = $reservation_data->mail;

        $new_reservation->save();
    }


    public function list(){
        return Reservation::all();
    }
}
