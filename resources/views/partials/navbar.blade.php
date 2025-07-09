<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Navigation principale">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">GB-MI<span>.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about.index') }}">À propos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('publication.index') }}">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact.create') }}">Contact</a></li>
            </ul>
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="#"><img src="{{ asset('images/user.svg') }}"></a></li>
                <li>
                    <a class="nav-link position-relative" href="{{ route('panier') }}">
                        <img src="{{ asset('images/cart.svg') }}">
                        <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.8rem;display:none;">0</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
