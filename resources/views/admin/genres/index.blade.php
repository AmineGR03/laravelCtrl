@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Genres</h1>
        <a href="{{ route('genres.create') }}" class="btn btn-primary">Ajouter un genre</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->nom }}</td>
                        <td>
                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')   
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $genres->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection