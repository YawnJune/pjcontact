
@extends('layouts.app')

@section('titre', 'Modifier un contact - CallMe!')

@section('titre_page', 'Modifier un contact ♡')

@section('contenu')
<div class="container py-4">

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">

            <h2 class="mb-2">Modifier un contact ✏️</h2>
            <p class="text-muted mb-4">
                Modifie les informations de ton contact ci-dessous.
            </p>

            <form action="{{ route('contacts.update', $contact) }}" method="POST">
                @csrf
                @method('PUT')

                <h5 class="mb-3">Informations personnelles</h5>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="prenom" class="form-label">Prénom *</label>
                        <input
                            type="text"
                            name="prenom"
                            id="prenom"
                            class="form-control"
                            value="{{ old('prenom', $contact->prenom) }}"
                            required
                        >
                        @error('prenom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nom" class="form-label">Nom *</label>
                        <input
                            type="text"
                            name="nom"
                            id="nom"
                            class="form-control"
                            value="{{ old('nom', $contact->nom) }}"
                            required
                        >
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tel" class="form-label">Téléphone</label>
                    <input
                        type="text"
                        name="tel"
                        id="tel"
                        class="form-control"
                        value="{{ old('tel', $contact->tel) }}"
                    >
                    @error('tel')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="{{ old('email', $contact->email) }}"
                    >
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="adresse" class="form-label">Adresse</label>
                    <textarea
                        name="adresse"
                        id="adresse"
                        class="form-control"
                        rows="2"
                    >{{ old('adresse', $contact->adresse) }}</textarea>
                    @error('adresse')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h5 class="mb-3">Informations professionnelles</h5>

                <div class="mb-3">
                    <label for="entreprise" class="form-label">Entreprise</label>
                    <input
                        type="text"
                        name="entreprise"
                        id="entreprise"
                        class="form-control"
                        value="{{ old('entreprise', $contact->entreprise) }}"
                    >
                    @error('entreprise')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="poste" class="form-label">Poste occupé</label>
                    <input
                        type="text"
                        name="poste"
                        id="poste"
                        class="form-control"
                        value="{{ old('poste', $contact->poste) }}"
                    >
                    @error('poste')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <h5 class="mb-3">Groupe du contact</h5>

                <div class="mb-4">
                    <label for="groupe_id" class="form-label">Choisir un groupe</label>
                    <select
                        name="groupe_id"
                        id="groupe_id"
                        class="form-select"
                    >
                        <option value="">Aucun groupe</option>

                        @foreach ($groupes as $groupe)
                            <option
                                value="{{ $groupe->id }}"
                                @selected(old('groupe_id', $contact->groupe_id) == $groupe->id)
                            >
                                {{ $groupe->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('groupe_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <button type="submit" class="btn btn-ajouter">
                        Enregistrer les modifications
                    </button>

                    <a href="{{ route('contacts.index') }}"
                       class="btn btn-outline-secondary">
                        Annuler
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
