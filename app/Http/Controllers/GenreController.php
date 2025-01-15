<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Afficher la liste des genres.
     */
    public function index()
    {
        $genres = Genre::all();
        return response()->json(['genres' => $genres]);
    }
}
