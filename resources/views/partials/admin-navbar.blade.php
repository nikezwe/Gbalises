<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('balise.index') }}">Balises</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('typebalise.index') }}">Catégories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('stock.index') }}">Stocks</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Utilisateurs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('commande.index') }}">Commandes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('facturation.index') }}">Facturation</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="nav-link text-light">Bonjour, {{ Auth::user()->name }}</span>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-light btn-sm">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
