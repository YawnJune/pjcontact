
@extends('layouts.app')

@section('titre', 'Ajouter un contact - CallMe!')

@section('titre_page', 'Ajouter un contact ♡')

@section('contenu')

<div class="mb-4">
    <h2 class="fw-bold">Une nouvelle personne dans mon carnet 🌷</h2>
    <p class="text-secondary">
        Remplis les informations ci-dessous pour enregistrer ton contact.
    </p>
</div>

<div class="card">
    <div class="card-body p-4 p-md-5">

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf

            <!-- Informations personnelles -->
            <h3 class="h5 fw-bold mb-3">Informations personnelles 💚</h3>

            <div class="row g-3 mb-4">

                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom *</label>
                    <input
                        type="text"
                        name="prenom"
                        id="prenom"
                        class="form-control @error('prenom') is-invalid @enderror"
                        value="{{ old('prenom') }}"
                        required
                    >
                    @error('prenom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom *</label>
                    <input
                        type="text"
                        name="nom"
                        id="nom"
                        class="form-control @error('nom') is-invalid @enderror"
                        value="{{ old('nom') }}"
                        required
                    >
                    @error('nom')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="tel" class="form-label">Téléphone</label>
                    <input
                        type="text"
                        name="tel"
                        id="tel"
                        class="form-control @error('tel') is-invalid @enderror"
                        value="{{ old('tel') }}"
                    >
                    @error('tel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input
                        type="text"
                        name="adresse"
                        id="adresse"
                        class="form-control @error('adresse') is-invalid @enderror"
                        value="{{ old('adresse') }}"
                    >
                    @error('adresse')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Informations professionnelles -->
            <h3 class="h5 fw-bold mb-3">Informations professionnelles 💼</h3>

            <div class="row g-3 mb-4">

                <div class="col-md-6">
                    <label for="entreprise" class="form-label">Entreprise</label>
                    <input
                        type="text"
                        name="entreprise"
                        id="entreprise"
                        class="form-control @error('entreprise') is-invalid @enderror"
                        value="{{ old('entreprise') }}"
                    >
                    @error('entreprise')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="poste" class="form-label">Poste occupé</label>
                    <input
                        type="text"
                        name="poste"
                        id="poste"
                        class="form-control @error('poste') is-invalid @enderror"
                        value="{{ old('poste') }}"
                    >
                    @error('poste')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Groupe -->
            <h3 class="h5 fw-bold mb-3">Organisation 🌼</h3>

            <div class="mb-4">
                <label for="groupe_id" class="form-label">Groupe de contact</label>

                <select
                    name="groupe_id"
                    id="groupe_id"
                    class="form-select @error('groupe_id') is-invalid @enderror"
                >
                    <option value="">-- Choisir un groupe --</option>

                    @foreach ($groupes as $groupe)
                        <option
                            value="{{ $groupe->id }}"
                            @selected(old('groupe_id') == $groupe->id)
                        >
                            {{ $groupe->nom }}
                        </option>
                    @endforeach
                </select>

                @error('groupe_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Boutons -->
            <div class="d-flex flex-wrap gap-2 justify-content-end">

                <a href="{{ route('contacts.index') }}"
                   class="btn btn-outline-secondary rounded-pill px-4">
                    Annuler
                </a>

                <button type="submit"
                        class="btn btn-ajouter rounded-pill px-4">
                    Enregistrer le contact ♡
                </button>

            </div>

        </form>

    </div>
</div>

@endsection
