<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function list() {
        return Movie::all();
    }

    public function detail($id) {
        return Movie::with(["projections"])->find($id);
    }

    public function create(Request $req){
        $movie_data = json_decode($req->getcontent());

        $newMovie = new Movie;

        $newMovie->title = $movie_data->title;
        $newMovie->year = $movie_data->year;
        $newMovie->duration = $movie_data->duration;
        $newMovie->img = $movie_data->img;
        $newMovie->description = $movie_data->description;

        $newMovie->save();

    }

    public function deleteMovie($id){
        $movie = Movie::find($id);
        $movie->delete();
    }
}
