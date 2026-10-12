@extends('layouts.app')

@section('titre', 'Accueil - CallMe!')

@section('titre_page', 'CallMe! ♡')

@section('contenu')

    <!-- Message de bienvenue -->
    <div class="card border-0 mb-4">
        <div class="card-body p-4 p-md-5">
            <div class="row align-items-center">

                <div class="col-md-8">
                    <span class="badge rounded-pill text-bg-success mb-3">
                        ✿ Bienvenue dans ton espace
                    </span>

                    <h2 class="fw-bold mb-3">
                        Tous tes contacts, <br>
                        au même endroit ! 🌷
                    </h2>

                    <p class="text-secondary mb-4">
                        Famille, amis, collègues… retrouve facilement
                        toutes les personnes qui comptent pour toi.
                    </p>

                    <a href="{{ route('contacts.create') }}"
                       class="btn btn-success rounded-pill px-4">
                        + Ajouter un contact
                    </a>
                </div>

                <div class="col-md-4 text-center mt-4 mt-md-0">
                    <div class="display-1">
                        📒
                    </div>
                    <p class="text-secondary mb-0">
                        Ton petit espace personnel ♡
                    </p>
                </div>

            </div>
        </div>
    </div>


    <!-- Statistiques -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="h4 fw-bold mb-0">
            Mon carnet en un coup d'œil ✨
        </h2>
    </div>

    <div class="row g-3 mb-5">

        <!-- Tous les contacts -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge rounded-pill text-bg-success">
                            Tous
                        </span>
                        <span class="fs-2">📇</span>
                    </div>

                    <h3 class="display-6 fw-bold mb-1">
                        {{ \App\Models\Contact::count() }}
                    </h3>

                    <p class="text-secondary mb-3">
                        Contacts enregistrés
                    </p>

                    <a href="{{ route('contacts.index') }}"
                       class="btn btn-outline-success rounded-pill">
                        Voir mes contacts →
                    </a>

                </div>
            </div>
        </div>


        <!-- Contacts personnels -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge rounded-pill text-bg-warning">
                            Personnel
                        </span>
                        <span class="fs-2">🌼</span>
                    </div>

                    <h3 class="display-6 fw-bold mb-1">
                        {{ \App\Models\Contact::whereHas('groupe', function ($query) {
                            $query->whereIn('nom', ['Famille', 'Amis']);
                        })->count() }}
                    </h3>

                    <p class="text-secondary mb-3">
                        Famille, amis et proches
                    </p>

                    <a href="{{ route('contacts.index') }}"
                       class="btn btn-outline-success rounded-pill">
                        Voir mes proches →
                    </a>

                </div>
            </div>
        </div>


        <!-- Contacts professionnels -->
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge rounded-pill text-bg-success">
                            Professionnel
                        </span>
                        <span class="fs-2">💼</span>
                    </div>

                    <h3 class="display-6 fw-bold mb-1">
                        {{ \App\Models\Contact::whereHas('groupe', function ($query) {
                            $query->where('nom', 'Collègues');
                        })->count() }}
                    </h3>

                    <p class="text-secondary mb-3">
                        Collègues et relations de travail
                    </p>

                    <a href="{{ route('contacts.index') }}"
                       class="btn btn-outline-success rounded-pill">
                        Voir mes contacts pro →
                    </a>

                </div>
            </div>
        </div>

    </div>


    <!-- Accès rapides -->
    <div class="mb-4">
        <h2 class="h4 fw-bold mb-3">
            Que souhaites-tu faire ? 🌸
        </h2>

        <div class="row g-3">

            <div class="col-md-4">
                <a href="{{ route('contacts.create') }}"
                   class="card h-100 text-decoration-none">
                    <div class="card-body p-4">
                        <div class="fs-2 mb-2">💌</div>
                        <h3 class="h5 fw-bold text-success">
                            Ajouter un contact
                        </h3>
                        <p class="text-secondary mb-0">
                            Enregistre une nouvelle personne dans ton carnet.
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('contacts.index') }}"
                   class="card h-100 text-decoration-none">
                    <div class="card-body p-4">
                        <div class="fs-2 mb-2">🔎</div>
                        <h3 class="h5 fw-bold text-success">
                            Retrouver un contact
                        </h3>
                        <p class="text-secondary mb-0">
                            Consulte la liste de toutes tes connaissances.
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('groupes.index') }}"
                   class="card h-100 text-decoration-none">
                    <div class="card-body p-4">
                        <div class="fs-2 mb-2">🧸</div>
                        <h3 class="h5 fw-bold text-success">
                            Gérer mes groupes
                        </h3>
                        <p class="text-secondary mb-0">
                            Organise tes contacts selon tes catégories.
                        </p>
                    </div>
                </a>
            </div>

        </div>
    </div>


    <!-- Petit message de fin -->
    <div class="text-center py-4">
        <p class="text-secondary mb-1">
            🌿 Un carnet bien organisé, l'esprit tranquille.
        </p>
        <small class="text-secondary">
            Fait avec ♡ pour garder le lien avec ceux qui comptent.
        </small>
    </div>

@endsection