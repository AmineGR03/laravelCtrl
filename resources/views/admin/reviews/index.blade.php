@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <!-- En-tête de la carte -->
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Gestion des critiques</h3>
                </div>
                <div class="card-body">
                    <!-- Table des critiques -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th> <!-- Identifiant unique de la critique -->
                                <th>Utilisateur</th> <!-- Nom et prénom de l'utilisateur ayant soumis la critique -->
                                <th>Film</th> <!-- Titre du film concerné par la critique -->
                                <th>Note</th> <!-- Note donnée au film -->
                                <th>Commentaire</th> <!-- Commentaire écrit par l'utilisateur -->
                                <th>Actions</th> <!-- Actions disponibles pour gérer la critique -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Parcours des critiques -->
                            @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $review->id }}</td> <!-- Affichage de l'ID de la critique -->
                                <td>{{ $review->user->nom }} {{ $review->user->prenom }}</td> <!-- Nom complet de l'utilisateur -->
                                <td>{{ $review->film->titre }}</td> <!-- Titre du film lié à la critique -->
                                <td>{{ $review->note }}</td> <!-- Note attribuée par l'utilisateur -->
                                <td>{{ Str::limit($review->commentaire, 50) }}</td> <!-- Limitation du commentaire à 50 caractères -->
                                <td>
                                    <!-- Formulaire pour supprimer la critique -->
                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                                        @csrf <!-- Protection CSRF -->
                                        @method('DELETE') <!-- Méthode DELETE pour la suppression -->
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
