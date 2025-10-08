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
                                <p><a href="" class="btn btn-secondary me-2">Nos Produits</a></p>
                            </div>
                        </div>
                            <div class="col-lg-7">
                                <div class="hero-img-wrap">
                                    <img src="{{ asset('images/geolocalisation.jpg') }}" class="img-fluid">
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
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="#" style="text-decoration: none; color: inherit; display: block;">
                            <div class="product-image-container" style="position: relative; overflow: hidden; border-radius: 10px; margin-bottom: 15px;">
                                @if($balise->image)
                                    <img src="{{ asset('storage/' . $balise->image) }}" alt="{{ $balise->nom }}" class="img-fluid product-thumbnail" style="width: 100%; height: 250px; object-fit: cover;">
                                @else
                                    <div class="img-fluid product-thumbnail" style="width: 100%; height: 250px; background: linear-gradient(45deg,#f1f2f3,#e8e9ea); display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                                        📱
                                    </div>
                                @endif
                            </div>
                            
                            <h3 class="product-title" style="font-size: 1.2rem; font-weight: bold; margin-bottom: 10px; min-height: 2.2rem;">{{ $balise->nom }}</h3>
                            
                            <div class="product-meta mb-2" style="font-size: 0.9rem; color: #666; margin-bottom: 8px;">
                                <span class="product-category" style="background: #e3f2fd; color: #1976d2; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem;">
                                    {{ $balise->typebalise->nom ?? 'Non catégorisé' }}
                                </span>
                                <span style="float: right;">Réf: {{ $balise->reference ?? $balise->id }}</span>
                            </div>
                            
                            <strong class="product-price" style="font-size: 1.3rem; font-weight: bold; color: #667eea;">{{ number_format($balise->prix, 0, '.', ' ') }}€</strong>

                            <span class="icon-cross add-to-cart" style="position: absolute; top: 10px; right: 10px; background: #667eea; color: white; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 18px; transition: all 0.3s ease;"
                                data-id="{{ $balise->id }}"
                                data-nom="{{ $balise->nom }}"
                                data-reference="{{ $balise->reference ?? $balise->id }}"
                                data-prix="{{ $balise->prix }}"
                                data-image="{{ $balise->image }}"
                                data-categorie="{{ $balise->typebalise->nom ?? 'Non catégorisé' }}"
                                onclick="event.preventDefault(); addToCart(this);">
                                +
                            </span>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Aucun produit disponible pour le moment.</p>
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
                                    <h3>Fast</h3>
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
                            <img src="{{ asset('images/geolocalisation.jpg') }}" alt="Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our popular product -->
        	<div class="untree_co-section product-section before-footer-section">
			<div class="container">
                <h2 class="text-center mb-4">Our Popular Products</h2>
				<div class="row">

					<!-- Start Column 3 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/geolocalisation.jpg" class="img-fluid product-thumbnail">
							<h3 class="product-title">geolocalisaion</h3>
							<strong class="product-price">100 000FBU</strong>
						</a>
					</div>
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/camera1.jpg" class="img-fluid product-thumbnail">
							<h3 class="product-title">Intelligent camera</h3>
							<strong class="product-price">100 000FBU</strong>
						</a>
					</div>
					<!-- End Column 4 -->
						
					<!-- Start Column 2 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/cle chauffeur2.jpg" class="img-fluid product-thumbnail">
							<h3 class="product-title">geolocalisation2</h3>
							<strong class="product-price">150 000FBU</strong>
						</a>
					</div> 
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="#">
							<img src="images/carburant.jpg" class="img-fluid product-thumbnail">
							<h3 class="product-title">carburant2</h3>
							<strong class="product-price">$100 000FBU</strong>
						</a>
					</div>
					<!-- End Column 3 -->
				</div>
                    <p class="text-center mt-3">Optez pour un partenaire de confiance et une solution parfaitement adaptée à vos besoins.</p>

			</div>
		</div>
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
<script>
function addToCart(element) {
    // Récupérer les données du produit
    const productData = {
        id: element.dataset.id,
        nom: element.dataset.nom,
        reference: element.dataset.reference,
        prix: element.dataset.prix,
        image: element.dataset.image,
        categorie: element.dataset.categorie
    };
    
    // Ici vous pouvez ajouter votre logique d'ajout au panier
    console.log('Produit ajouté:', productData);
    
    // Animation visuelle
    element.style.background = '#28a745';
    element.innerHTML = '✓';
    setTimeout(() => {
        element.style.background = '#667eea';
        element.innerHTML = '+';
    }, 1000);
}
</script>
@endpush
@include('admin.footer')
@endsection
