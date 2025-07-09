@extends('layouts.app')
@section('title', 'Accueil')
@section('content')


        <!-- Start Hero Section -->
            <div class="hero">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-5">
                            <div class="intro-excerpt">
                                <h1>Micro Inform <span class="d-block">Burundi</span></h1>
                                <p class="mb-4">Découvrez notre collection exclusive de produits informatiques de qualité.</p>
                                <p><a href="" class="btn btn-secondary me-2">Nos Produits</a><a href="#" class="btn btn-white-outline">Explore</a></p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="hero-img-wrap">
                                <img src="images/couch.png" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Hero Section -->

        <!-- Section dynamique des produits (balises) avec le style de la page -->
        <div class="products-section py-5" style="background:rgba(255,255,255,0.95);border-radius:20px;margin:2rem 0;">
            <div class="container">
                <h2 class="section-title text-center mb-5" style="background:linear-gradient(45deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Nos Produits</h2>
                <div class="row justify-content-center">
                    @forelse($balises as $balise)
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="product-card p-3 h-100 shadow-sm rounded" style="background:white;">
                                <div class="product-image mb-3 text-center" style="height:180px;overflow:hidden;background:linear-gradient(45deg,#f1f2f3,#e8e9ea);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                    @if($balise->image)
                                        <img src="{{ asset('storage/' . $balise->image) }}" alt="{{ $balise->nom }}" style="max-height:170px;max-width:100%;object-fit:cover;">
                                    @else
                                        <span style="font-size:3rem;color:#667eea;">📱</span>
                                    @endif
                                </div>
                                <h3 class="product-title" style="font-size:1.2rem;font-weight:bold;min-height:2.2rem;">{{ $balise->nom }}</h3>
                                <div class="product-meta mb-2 d-flex justify-content-between text-muted" style="font-size:0.9rem;">
                                    <span class="product-category badge bg-light text-primary">{{ $balise->typebalise->nom ?? 'Non catégorisé' }}</span>
                                    <span>Réf: {{ $balise->reference ?? $balise->id }}</span>
                                </div>
                                <div class="product-price mb-2" style="font-size:1.3rem;font-weight:bold;color:#667eea;">{{ number_format($balise->prix, 0, '.', ' ') }}€</div>
                                <p class="product-description mb-3" style="color:#666;min-height:2.5rem;">{{ $balise->description ?? 'Description non disponible' }}</p>
                                <button class="btn btn-primary w-100 add-to-cart" type="button"
                                    data-id="{{ $balise->id }}"
                                    data-nom="{{ $balise->nom }}"
                                    data-reference="{{ $balise->reference ?? $balise->id }}"
                                    data-prix="{{ $balise->prix }}"
                                    data-image="{{ $balise->image }}"
                                    data-categorie="{{ $balise->typebalise->nom ?? 'Non catégorisé' }}"
                                >
                                    Ajouter au panier
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="empty-state text-center py-5">
                                <div class="empty-state-icon" style="font-size:3rem;">📦</div>
                                <h3>Aucun produit trouvé</h3>
                                <p>Essayez de modifier vos critères de recherche.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div style="margin-top:2rem; text-align:center;">
                    {{ $balises->links() }}
                </div>
            </div>
        </div>

        <!-- Start Why Choose Us Section -->
        <div class="why-choose-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <h2 class="section-title">Qui sommes nous?</h2>
                        <p>Fournisseur de plusieurs demandes en informatique,
                            MICROINFORM assure également l'assistance et le conseil 
                            en informatique.
                        </p>

                        <div class="row my-5">
                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="images/truck.svg" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>Fast &amp; Free Shipping</h3>
                                    <p>MICROINFORM est là pour trouver la solution adaptée aux besoins informatiques de votre entreprise, quel que soit votre secteur d'activité.</p>
                                </div>
                            </div>          

                            <div class="col-6 col-md-6">
                                <div class="feature">
                                    <div class="icon">
                                        <img src="images/support.svg" alt="Image" class="imf-fluid">
                                    </div>
                                    <h3>24/7 Support</h3>
                                    <p>Notre staff est disponible 6 jours sur 7 pour vous aider.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="img-wrap">
                            <img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Section produits populaires supprimée (affichage dynamique uniquement) -->
        @include('partials.footer')


@push('scripts')
<script>
// Ajout au panier (localStorage) et mise à jour du badge
function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem('cart') || '[]');
    let count = cart.reduce((sum, item) => sum + (item.quantite || item.quantity || 1), 0);
    let badge = document.getElementById('cart-count');
    if (badge) {
        badge.textContent = count;
        badge.style.display = count > 0 ? 'inline-block' : 'none';
    }
}

document.querySelectorAll('.add-to-cart').forEach(btn => {
    btn.addEventListener('click', function() {
        const product = {
            id: this.dataset.id,
            nom: this.dataset.nom,
            prix: parseFloat(this.dataset.prix),
            image: this.dataset.image,
            reference: this.dataset.reference,
            categorie: this.dataset.categorie,
            quantite: 1
        };
        let cart = JSON.parse(localStorage.getItem('cart') || '[]');
        const found = cart.find(item => item.id == product.id);
        if (found) { found.quantite++; }
        else { cart.push(product); }
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        alert('Produit ajouté au panier !');
    });
});

// Mettre à jour le badge au chargement
document.addEventListener('DOMContentLoaded', updateCartCount);
</script>
@endpush

@endsection
