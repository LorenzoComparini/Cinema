<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function create(Request $req){
        $reservation_data = json_decode($req->getContent());

        $new_reservation = new Reservation();

        $new_reservation->projection_id = $reservation_data->projection_id;
        $new_reservation->name = $reservation_data->name;
        $new_reservation->surname = $reservation_data->surname;
        $new_reservation->mail = $reservation_data->mail;

        $new_reservation->save();

        $tickets = $reservation_data->list;
        // Log::info($tickets);

        foreach ($tickets as $ticket) {
            $new_ticket = new Ticket();
            $new_ticket->reservation_id = $new_reservation->id;
            $new_ticket->row = $ticket->row;
            $new_ticket->col = $ticket->col;

            $new_ticket->save();

            // Log::info($new_ticket);
            // return response()->json($new_ticket, 201);
        }
        
        // Log::info($new_reservation->id);
        // return response()->json($new_reservation, 201);
    }


    public function list(){
        return Reservation::all();
    }

    public function all_reservations_details(){
        return Reservation::with(["tickets", "projection", "projection.movie"])->get();
    }

    public function deleteReservation(Request $id){
        $reservation = Reservation::find($id);
        
        foreach($reservation->tickets as $t){
            $t->delete();
        };

        $reservation->delete();
    }
}
