<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Review;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Affiche la liste des films.
     */
    public function index()
    {

        $films = Film::with('genres')->paginate(5); // Charger les genres associés
        return view('films.index', compact('films'));
    }

    /**
     * Affiche le détail d'un film.
     */
    public function show($id)
    {
        $film = Film::with(['genres', 'reviews.user'])->findOrFail($id); // Charger genres et reviews
        return view('films.show', compact('film'));
    }
}
