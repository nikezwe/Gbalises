 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GB</title>
   <link rel="stylesheet" href="{{asset('css/boostrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Style pour l'élément actif du menu */
        .navbar-nav .nav-item.active .nav-link {
            font-weight: bold;
            background-color: rgb(46, 82, 136); /* Changer la couleur de fond de l'élément actif */
            color: white !important; /* Assurez-vous que la couleur du texte soit blanche */
        }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">GB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item {{ request()->is('publication') ? 'active' : '' }}">
                    <a class="nav-link" href="/publication">Publication</a>
                </li>
                <li class="nav-item {{ request()->is('admin/balise*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.balise.index') }}">Gestion des Balises</a>
                </li>
                <li class="nav-item {{ request()->is('admin/typebalise*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.typebalise.index') }}">Gestion des Types Balises</a>
                </li>
                <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">Listes des commandes</a>
                </li>
                <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="/about">A propos de nous</a>
                </li>
                <li class="nav-item {{ request()->is('contact/create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact.create') }}">Contacter nous</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a class="nav-link disabled">Bienvenue, {{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="text-decoration: none;">Se déconnecter</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<script src="{{asset('js/boostrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


