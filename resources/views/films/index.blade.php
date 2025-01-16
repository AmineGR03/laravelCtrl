@extends('layouts.app')

@section('content')

<style>
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .pagination .page-item .page-link {
        color: #343a40;
        border: 1px solid #343a40;
        margin: 0 5px;
    }

    .pagination .page-item.active .page-link {
        background-color: #343a40;
        color: #ffffff;
        border-color: #343a40;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #f8f9fa;
    }

    .pagination .page-link:hover {
        background-color: #ffc107;
        color: #343a40;
    }
</style>

<div class="container">
    <h1 class="mb-4">Films</h1>
    
    <!-- Affichage des cartes de films -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($films as $film)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <!-- Image du film -->
                    <img src="{{ $film->affiche }}" class="card-img-top" alt="Film Image">
                    
                    <div class="card-body">
                        <!-- Titre du film -->
                        <h5 class="card-title">{{ $film->title }}</h5>
                        
                        <!-- Description avec texte tronqué -->
                        <p class="card-text text-truncate" style="max-height: 4rem; overflow: hidden;">
                            {{ $film->description }}
                        </p>
                        
                        <!-- Informations supplémentaires -->
                        <p class="text-muted"><strong>Date de sortie :</strong> {{ $film->dateSortie }}</p>
                        <p class="text-muted"><strong>Durée :</strong> {{ $film->duree }} minutes</p>
                    </div>
                    
                    <!-- Bouton pour voir les détails -->
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('films.show', $film->id) }}" class="btn btn-primary w-100">
                            Voir les détails
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $films->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection
