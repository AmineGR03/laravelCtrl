@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Modifier le film</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre', $film->titre) }}" required>
                            @error('titre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $film->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dateSortie" class="form-label">Date de sortie</label>
                            <input type="date" class="form-control" id="dateSortie" name="dateSortie" value="{{ old('dateSortie', $film->dateSortie) }}" required>
                            @error('dateSortie')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="directeur" class="form-label">Directeur</label>
                            <input type="text" class="form-control" id="directeur" name="directeur" value="{{ old('directeur', $film->directeur) }}" required>
                            @error('directeur')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="duree" class="form-label">Durée (en minutes)</label>
                            <input type="text" class="form-control" id="duree" name="duree" value="{{ old('duree', $film->duree) }}" required>
                            @error('duree')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="affiche" class="form-label">Affiche</label>
                            <input type="file" class="form-control" id="affiche" name="affiche">
                            @if ($film->affiche)
                                <div class="mt-2">
                                    <img src="{{$film->affiche}}" alt="Affiche du film" style="max-width: 200px;">
                                </div>
                            @endif
                            @error('affiche')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Mettre à jour le film</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
