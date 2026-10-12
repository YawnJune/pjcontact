
@extends('layouts.app')

@section('titre', 'Modifier un groupe - CallMe!')

@section('titre_page', 'Modifier un groupe ♡')

@section('contenu')
<div class="container py-4">

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <h2 class="mb-2">Modifier le groupe ✏️</h2>
            <p class="text-muted mb-4">
                Modifie le nom de ton groupe ci-dessous.
            </p>

            <form action="{{ route('groupes.update', $groupe) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nom" class="form-label">Nom du groupe *</label>

                    <input
                        type="text"
                        name="nom"
                        id="nom"
                        class="form-control"
                        value="{{ old('nom', $groupe->nom) }}"
                        maxlength="255"
                        required
                    >

                    @error('nom')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <button type="submit" class="btn btn-ajouter">
                        Enregistrer les modifications
                    </button>

                    <a href="{{ route('groupes.index') }}"
                       class="btn btn-outline-secondary">
                        Annuler
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
