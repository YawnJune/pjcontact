<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('titre', 'CallMe !')</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">

        <a class="navbar-brand" href="{{ route('accueil') }}">
            ♡ CallMe!
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navigationPrincipale"
            aria-controls="navigationPrincipale"
            aria-expanded="false"
            aria-label="Ouvrir la navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigationPrincipale">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('accueil') }}">
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts.index') }}">
                        Mes contacts
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('groupes.index') }}">
                        Mes groupes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn-ajouter" href="{{ route('contacts.create') }}">
                        + Ajouter un contact
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

    <main>
        <h1>@yield('titre_page', 'Tableau de bord')</h1>

        @yield('contenu')
    </main>

</body>
</html>