@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Gestion des films</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('films.create') }}" class="btn btn-success mb-3">Ajouter un film</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Date de sortie</th>
                                <th>Directeur</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($films as $film)
                            <tr>
                                <td>{{ $film->id }}</td>
                                <td>{{ $film->titre }}</td>
                                <td>{{ Str::limit($film->description, 50) }}</td>
                                <td>{{ $film->dateSortie }}</td>
                                <td>{{ $film->directeur }}</td>
                                <td>
                                    <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
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
