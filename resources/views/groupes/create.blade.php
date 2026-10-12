
@extends('layouts.app')

@section('titre', 'Ajouter un groupe - CallMe!')

@section('titre_page', 'Ajouter un groupe ♡')

@section('contenu')
<div class="container py-4">

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <h2 class="mb-2">Créer un groupe 🌱</h2>
            <p class="text-muted mb-4">
                Donne un nom à ton nouveau groupe pour mieux organiser tes contacts.
            </p>

            <form action="{{ route('groupes.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nom" class="form-label">Nom du groupe *</label>

                    <input
                        type="text"
                        name="nom"
                        id="nom"
                        class="form-control"
                        value="{{ old('nom') }}"
                        placeholder="Ex. : Famille, Amis, Clients..."
                        maxlength="255"
                        required
                    >

                    @error('nom')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <button type="submit" class="btn btn-ajouter">
                        Créer le groupe
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
