
@extends('layouts.app')

@section('titre', 'Mes contacts - CallMe!')

@section('titre_page', 'Mes petits contacts ♡')

@section('contenu')

    <!-- En-tête de la page -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-2">Mon répertoire 🌷</h2>
            <p class="text-secondary mb-0">
                Toutes les personnes importantes réunies au même endroit.
            </p>
        </div>

        <a href="{{ route('contacts.create') }}"
           class="btn btn-ajouter rounded-pill px-4">
            + Ajouter un contact
        </a>

    </div>


    <!-- Barre de recherche -->
    <div class="card mb-4">
        <div class="card-body p-3">

            <form action="{{ route('contacts.index') }}" method="GET">
                <div class="row g-2">

                    <div class="col-md-9">
                        <input
                            type="text"
                            name="recherche"
                            class="form-control rounded-pill"
                            placeholder="🔎 Rechercher par nom, prénom ou téléphone..."
                            value="{{ request('recherche') }}"
                        >
                    </div>

                    <div class="col-md-3">
                        <button type="submit"
                                class="btn btn-success rounded-pill w-100">
                            Rechercher
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>


    <!-- Nombre de contacts -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="h5 fw-bold mb-0">Ma collection de contacts 💚</h3>

        <span class="badge rounded-pill text-bg-success">
            {{ $contacts->count() }} contact(s)
        </span>
    </div>


    <!-- Tableau des contacts -->
    <div class="card">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead>
                        <tr>
                            <th class="p-3">Nom complet</th>
                            <th class="p-3">Téléphone</th>
                            <th class="p-3">E-mail</th>
                            <th class="p-3">Groupe</th>
                            <th class="p-3 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($contacts as $contact)

                            <tr>
                                <td class="p-3">
                                    <span class="fw-semibold">
                                        {{ $contact->prenom }} {{ $contact->nom }}
                                    </span>
                                </td>

                                <td class="p-3">
                                    {{ $contact->tel ?: 'Non renseigné' }}
                                </td>

                                <td class="p-3">
                                    {{ $contact->email ?: 'Non renseigné' }}
                                </td>

                                <td class="p-3">
                                    @if ($contact->groupe)
                                        <span class="badge rounded-pill text-bg-success">
                                            {{ $contact->groupe->nom }}
                                        </span>
                                    @else
                                        <span class="text-secondary small">
                                            Aucun groupe
                                        </span>
                                    @endif
                                </td>

                                <td class="p-3 text-center">
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('contacts.edit', $contact) }}"
                                           class="btn btn-sm btn-outline-success rounded-pill"
                                           title="Modifier">
                                            ✏️
                                        </a>

                                        <form action="{{ route('contacts.destroy', $contact) }}"
                                              method="POST"
                                              onsubmit="return confirm('Veux-tu vraiment supprimer ce contact ?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger rounded-pill"
                                                    title="Supprimer">
                                                🗑️
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center p-5">

                                    <div class="display-4 mb-3">🌼</div>

                                    <h4 class="h5 fw-bold">
                                        Ton carnet est encore vide !
                                    </h4>

                                    <p class="text-secondary">
                                        Ajoute ton premier contact pour commencer.
                                    </p>

                                    <a href="{{ route('contacts.create') }}"
                                       class="btn btn-success rounded-pill px-4">
                                        + Ajouter mon premier contact
                                    </a>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
