<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Gère la création d'un avis.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'film_id' => 'required|exists:films,id', // Vérifie que le film existe
            'note' => 'required|integer|min:1|max:5', // Validation de la note
            'commentaire' => 'nullable|string', // Validation du commentaire
        ]);
    
        // Création de l'avis
        $review = new Review();
        $review->user_id = auth()->user()->id; // L'utilisateur connecté
        $review->film_id = $request->film_id;
        $review->note = $request->note; // Utilisez 'note' au lieu de 'rating'
        $review->commentaire = $request->commentaire; // Utilisez 'commentaire' au lieu de 'comment'
        $review->save();
    
        // Rediriger avec un message de succès
        return redirect()->route('films.show', $request->film_id)
                         ->with('success', 'Votre avis a été ajouté.');
    }
    
}
