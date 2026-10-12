
@extends('layouts.app')

@section('titre', 'Mes groupes - CallMe!')

@section('titre_page', 'Mes groupes ♡')

@section('contenu')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h2>Mes groupes ♡</h2>
            <p class="text-muted mb-0">
                Organise tes contacts selon tes relations.
            </p>
        </div>

        <a href="{{ route('groupes.create') }}" class="btn btn-ajouter">
            + Ajouter un groupe
        </a>
    </div>

    @if (session('succes'))
        <div class="alert alert-success">
            {{ session('succes') }}
        </div>
    @endif

    @if ($groupes->isEmpty())
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body text-center py-5">
                <h5>Aucun groupe pour le moment 🌱</h5>
                <p class="text-muted">
                    Crée ton premier groupe pour mieux organiser tes contacts.
                </p>

                <a href="{{ route('groupes.create') }}" class="btn btn-ajouter">
                    Créer mon premier groupe
                </a>
            </div>
        </div>
    @else
        <div class="row g-3">
            @foreach ($groupes as $groupe)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">

                            <h5 class="card-title mb-2">
                                ♡ {{ $groupe->nom }}
                            </h5>

                            <p class="text-muted mb-3">
                                {{ $groupe->contacts_count }}
                                contact(s)
                            </p>

                            <div class="d-flex gap-2 flex-wrap">
                                <a
                                    href="{{ route('groupes.edit', $groupe) }}"
                                    class="btn btn-sm btn-outline-success rounded-pill"
                                           title="Modifier">
                                            ✏️
                                </a>

                                <form
                                    action="{{ route('groupes.destroy', $groupe) }}"
                                    method="POST"
                                    onsubmit="return confirm('Voulez-vous vraiment supprimer ce groupe ?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill"
                                                    title="Supprimer">
                                                🗑️
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
