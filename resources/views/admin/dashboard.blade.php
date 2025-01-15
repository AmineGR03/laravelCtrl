@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Tableau de bord - Administrateur</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Statistiques</h4>
                            <ul>
                                <li>Total des films : {{ $filmsCount }}</li>
                                <li>Total des utilisateurs : {{ $usersCount }}</li>
                                <li>Total des critiques : {{ $reviewsCount }}</li>
                                <li>Total des genres : {{ $genresCount }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4>Actions récentes</h4>
                            <ul>
                                <li>Nouvelle inscription utilisateur</li>
                                <li>Film ajouté : "Inception"</li>
                                <li>Film modifié : "Avengers"</li>
                            </ul>
                        </div>
                    </div>

                    <hr>

                    <h4>Gestion des utilisateurs et films</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('users.index') }}" class="btn btn-warning btn-block">Gérer les utilisateurs</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('films.index') }}" class="btn btn-info btn-block">Gérer les films</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('reviews.index') }}" class="btn btn-success btn-block">Gérer les critiques</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
