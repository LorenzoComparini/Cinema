<?php

namespace App\Http\Controllers;

use App\Models\Projection;
use Illuminate\Http\Request;

class ProjectionController extends Controller
{
    public function list() {
        return Projection::all();
    }

    public function detail($id) {
        return Projection::find($id);
    }

    public function movieSchedule($id){
        return Projection::where('movie_id', $id)->orderBy('date', 'asc')->withCount("tickets")->get();
    }   

    public function projection_tickets($projection_id){
        $projection = Projection::find($projection_id);
        return $projection->tickets;
    }

    public function new_projection(Request $req){
        $projection_data = json_decode($req->getContent());

        $newProjection = new Projection();

        $newProjection->movie_id = $projection_data->movie_id;
        $newProjection->date = $projection_data->date;
        $newProjection->{'3d'} = $projection_data->{'3d'};
        $newProjection->room_id = $projection_data->room_id;

        $newProjection->save();

    }
}
