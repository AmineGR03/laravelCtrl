@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-sm">
                <!-- En-tête de la carte -->
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Créer un nouveau film</h3>
                </div>
                <div class="card-body">
                    <!-- Début du formulaire -->
                    <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Protection contre les attaques CSRF -->

                        <!-- Champ pour le titre du film -->
                        <div class="form-group mb-3">
                            <label for="titre">Titre</label>
                            <input 
                                type="text" 
                                name="titre" 
                                id="titre" 
                                class="form-control @error('titre') is-invalid @enderror" 
                                value="{{ old('titre') }}" 
                                required>
                            @error('titre') <!-- Affichage des erreurs de validation -->
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ pour la description du film -->
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="5" 
                                class="form-control @error('description') is-invalid @enderror" 
                                required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ pour la date de sortie -->
                        <div class="form-group mb-3">
                            <label for="dateSortie">Date de sortie</label>
                            <input 
                                type="date" 
                                name="dateSortie" 
                                id="dateSortie" 
                                class="form-control @error('dateSortie') is-invalid @enderror" 
                                value="{{ old('dateSortie') }}" 
                                required>
                            @error('dateSortie')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ pour le réalisateur -->
                        <div class="form-group mb-3">
                            <label for="directeur">Réalisateur</label>
                            <input 
                                type="text" 
                                name="directeur" 
                                id="directeur" 
                                class="form-control @error('directeur') is-invalid @enderror" 
                                value="{{ old('directeur') }}" 
                                required>
                            @error('directeur')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ pour la durée du film -->
                        <div class="form-group mb-3">
                            <label for="duree">Durée (en minutes)</label>
                            <input 
                                type="number" 
                                name="duree" 
                                id="duree" 
                                class="form-control @error('duree') is-invalid @enderror" 
                                value="{{ old('duree') }}" 
                                required>
                            @error('duree')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Champ pour uploader une affiche -->
                        <div class="form-group mb-3">
                            <label for="affiche">Affiche</label>
                            <input 
                                type="file" 
                                name="affiche" 
                                id="affiche" 
                                class="form-control @error('affiche') is-invalid @enderror" 
                                accept="image/*">
                            @error('affiche')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sélection multiple des genres -->
                        <div class="form-group mb-3">
                            <label for="genres">Genres</label>
                            <select 
                                name="genres[]" 
                                id="genres" 
                                class="form-control @error('genres') is-invalid @enderror" 
                                multiple 
                                required>
                                @foreach($genres as $genre) <!-- Itère sur les genres disponibles -->
                                    <option 
                                        value="{{ $genre->id }}" 
                                        {{ in_array($genre->id, old('genres', [])) ? 'selected' : '' }}>
                                        {{ $genre->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('genres')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bouton pour soumettre le formulaire -->
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success btn-block">Créer le film</button>
                        </div>
                    </form>
                    <!-- Fin du formulaire -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
