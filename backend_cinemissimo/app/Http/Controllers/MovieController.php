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
        return Movie::find($id);
    }
}
