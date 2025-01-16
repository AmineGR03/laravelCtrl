@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <!-- En-tête de la carte avec le titre principal -->
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Tableau de bord - Administrateur</h3>
                </div>
                <div class="card-body">
                    <!-- Section des statistiques générales -->
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Statistiques</h4>
                            <ul>
                                <!-- Affiche les statistiques dynamiques passées depuis le contrôleur -->
                                <li>Total des films : {{ $filmsCount }}</li>
                                <li>Total des utilisateurs : {{ $usersCount }}</li>
                                <li>Total des critiques : {{ $reviewsCount }}</li>
                                <li>Total des genres : {{ $genresCount }}</li>
                            </ul>
                        </div>
                       
                    </div>

                    <hr>

                    <!-- Section pour la gestion des entités principales -->
                    <h4>Gestion des utilisateurs et films</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Bouton pour accéder à la gestion des utilisateurs -->
                            <a href="{{ route('users.index') }}" class="btn btn-warning btn-block">Gérer les utilisateurs</a>
                        </div>
                        <div class="col-md-3">
                            <!-- Bouton pour accéder à la gestion des films -->
                            <a href="{{ route('films.index') }}" class="btn btn-info btn-block">Gérer les films</a>
                        </div>
                        <div class="col-md-3">
                            <!-- Bouton pour accéder à la gestion des critiques -->
                            <a href="{{ route('reviews.index') }}" class="btn btn-success btn-block">Gérer les critiques</a>
                        </div>
                        <div class="col-md-3">
                            <!-- Bouton pour accéder à la gestion des genres -->
                            <a href="{{ route('genres.index') }}" class="btn btn-danger btn-block">Gérer les genres</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
