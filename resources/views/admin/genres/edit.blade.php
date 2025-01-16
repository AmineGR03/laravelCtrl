@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier un genre</h1>
        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom du genre</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $genre->nom }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection