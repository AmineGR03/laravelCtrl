 @extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un genre</h1>
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom du genre</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection