<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Navigation principale">
    <div class="container">
        {{-- ✅ Logo redirige selon le rôle --}}
        <a class="navbar-brand d-flex align-items-center" 
           href="{{ Auth::check() && Auth::user()->isAdmin() ? route('admin.dashboard') : route('home') }}">
            <img src="{{ asset('images/micro.jpeg') }}" alt="Logo" style="height:40px;" class="me-2">
            <span class="text-light fw-bold">MicroInform</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <!-- Menu principal -->
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                @auth
                    @if(Auth::user()->isAdmin())
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.balise.index') }}">Produits</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.typebalise.index') }}">Catégories</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.stock.index') }}">Stocks</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('product.index') }}">Produits</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about.index') }}">À propos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('publication.index') }}">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact.create') }}">Contact</a></li>
                    @endif
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('balise.index') }}">Produits</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about.index') }}">À propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('publication.index') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact.create') }}">Contact</a></li>
                @endauth
            </ul>

            <!-- Zone utilisateur & panier -->
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                @auth
                    {{-- ✅ Dropdown utilisateur --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/user.svg') }}" class="me-2"> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </li>

                    {{-- ✅ Icône panier visible uniquement pour non-admins --}}
                    @unless(Auth::user()->isAdmin())
                        <li>
                            <a class="nav-link position-relative" href="{{ route('panier') }}">
                                <img src="{{ asset('images/cart.svg') }}">
                                <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.8rem; display:none;">0</span>
                            </a>
                        </li>
                    @endunless

                @else
                    {{-- Utilisateur non connecté --}}
                    <li><a class="nav-link" href="{{ route('login') }}"><img src="{{ asset('images/user.svg') }}"></a></li>
                    <li>
                        <a class="nav-link position-relative" href="{{ route('panier') }}">
                            <img src="{{ asset('images/cart.svg') }}">
                            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.8rem; display:none;">0</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
