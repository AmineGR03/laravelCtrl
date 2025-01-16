<?php
namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Genre;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{


    public function dashboard()
{
   
    $filmsCount = Film::count();
    $usersCount = User::count();
    $reviewsCount = Review::count();
    $genresCount = Genre::count();

    
    return view('admin.dashboard', compact('filmsCount', 'usersCount', 'reviewsCount', 'genresCount'));
}
    // Afficher tous les films
    public function filmsIndex()
    {
        $films = Film::all();
        return view('admin.films.index', compact('films'));
    }

    // Ajouter un film
    public function createFilm()
    {
        $genres = Genre::all();
        return view('admin.films.create', compact('genres'));
    }

    // Enregistrer un film
    public function storeFilm(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'dateSortie' => 'required|date',
            'directeur' => 'required|string|max:255',
            'duree' => 'required|integer',
            'affiche' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'genres' => 'required|array',  // Validation pour les genres
            'genres.*' => 'exists:genres,id', // Validation des ID de genres existants
        ]);
    
        // Création du film
        $film = new Film();
        $film->titre = $request->titre;
        $film->description = $request->description;
        $film->dateSortie = $request->dateSortie;
        $film->directeur = $request->directeur;
        $film->duree = $request->duree;
    
        // Gestion de l'affiche
        if ($request->hasFile('affiche')) {
            $imagePath = $request->file('affiche')->store('public/affiches');
            $film->affiche = Storage::url($imagePath);
        }
    
        // Sauvegarder le film
        $film->save();
    
        // Associer les genres sélectionnés
        $film->genres()->sync($request->genres); // Associe les genres au film
    
        return redirect()->route('films.index')->with('success', 'Film créé avec succès!');
    }
    

    // Modifier un film
    public function editFilm($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::all();
        return view('admin.films.edit', compact('film', 'genres'));
    }

    // Mettre à jour un film
    public function updateFilm(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'dateSortie' => 'required|date',
            'directeur' => 'required|string',
            'duree' => 'required',
            'affiche' => '',
        ]);
       
        // Mise à jour du film s'il existe
        $film = Film::findOrFail($id);
        $film->update($request->all());

        return redirect()->route('films.index')->with('success', 'Film mis à jour avec succès');
    }

    // Supprimer un film
    public function deleteFilm($id)
    {
        Film::destroy($id);
        return redirect()->route('films.index')->with('success', 'Film supprimé avec succès');
    }

    // Afficher tous les utilisateurs
    public function usersIndex()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Ajouter un utilisateur
    public function createUser()
    {
        return view('admin.users.create');
    }

    // Enregistrer un utilisateur
    public function storeUser(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // Création de l'utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);
        // Redirection vers la page des utilisateurs
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
    }

    // Modifier un utilisateur
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Mettre à jour un utilisateur
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only(['nom', 'prenom', 'email', 'role']));

        if ($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

    // Supprimer un utilisateur
    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');
    }

    // Afficher toutes les critiques
    public function reviewsIndex()
    {
        $reviews = Review::with(['user', 'film'])->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    // Supprimer une critique
    public function deleteReview($id)
    {
        Review::destroy($id);
        return redirect()->route('reviews.index')->with('success', 'Critique supprimée avec succès');
    }

    // Afficher tous les genres
    public function genresIndex()
    {
        $genres = Genre::paginate(10);
        return view('admin.genres.index', compact('genres'));
    }
    // Ajouter un genre
    public function createGenre()
    {
        $genres = Genre::all();
        return view('admin.genres.create',compact('genres'));
    }

    // Enregistrer un genre
    public function storeGenre(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);
        Genre::create([
            'nom' => $request->nom,
        ]);
        return redirect()->route('genres.index')->with('success', 'Genre ajouté avec succès');
    }

    // Modifier un genre
    public function editGenre($id)
    {
        $genre = Genre::findOrFail($id);
        return view('admin.genres.edit', compact('genre'));
    }
    // Mettre à jour un genre
    public function updateGenre(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);
        $genre = Genre::findOrFail($id);
        $genre->update([
            'nom' => $request->nom,
        ]);
        return redirect()->route('genres.index')->with('success', 'Genre mis à jour avec succès');
    }

    // Supprimer un genre
    public function deleteGenre($id)
    {
        Genre::destroy($id);
        return redirect()->route('genres.index')->with('success', 'Genre supprimé avec succès');
    }

}
