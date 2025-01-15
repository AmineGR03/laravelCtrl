@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h1 class="mb-3"> {{ $film->titre }}</h1>
    <img src="{{$film->affiche}}" class="card-img-top" alt="Film Image">
    <p class="lead"> <b>Description :</b>{{ $film->description }}</p>
    <p><strong>Réalisateur :</strong> {{ $film->directeur }}</p>
    <p><strong>Date de sortie :</strong> {{ $film->dateSortie }}</p>
    <p><strong>Duree :</strong> {{ $film->duree }} minutes</p>

    <h3 class="mt-4">Genres :</h3>
    <ul class="list-group list-group-flush">
        @foreach ($film->genres as $genre)
            <li class="list-group-item">{{ $genre->nom }}</li>
        @endforeach
    </ul>

    <h3 class="mt-4">Commentaires et notes :</h3>
    @if ($film->reviews->count() > 0)
        @foreach ($film->reviews as $review)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-title"><strong>{{ $review->user->nom }}</strong> - {{ $review->note }}/5</p>
                    <p>{{ $review->commentaire }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>Aucun commentaire pour ce film pour l'instant.</p>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @auth
        <h3 class="mt-4">Laisser un avis :</h3>
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="film_id" value="{{ $film->id }}">
            
            <div class="mb-3">
                <label for="note" class="form-label">Note</label>
                <input type="number" id="note" name="note" class="form-control" min="1" max="5" required>
            </div>
            
            <div class="mb-3">
                <label for="commentaire" class="form-label">Commentaire</label>
                <textarea id="commentaire" name="commentaire" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        
    @else
        <p class="mt-3">Vous devez <a href="{{ route('login.form') }}">vous connecter</a> pour laisser un avis.</p>
    @endauth
</div>
@endsection
