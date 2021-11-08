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
        return Projection::where('movie_id', $id)->orderBy('date', 'asc')->get();
    }   
}