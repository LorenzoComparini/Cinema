<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(Request $req){
        $ticket_data = json_decode($req->getContent());
    }

    public function list(){
        return Ticket::all();
    }

    public function list_reservation_seats($reservation_id){
        return Ticket::where("reservation_id", $reservation_id)->get();
    }
}
