@extends('layouts.app')

@section('title', 'Nos Modules')

@section('content')

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Decouvrez Modules</h1>
								<h1>MI<span class="d-block">Burundi</span></h1>
								<p class="mb-4">Technologies de suivi, de contrôle et de sécurité pour véhicules intelligents.p>
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
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								{{-- <img src="images/couch.png" class="img-fluid"> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

<!-- Produits -->
<section class="container mb-5">
    <div class="row">
        @php
            $produits = [
                ['image' => 'key.jpeg', 'nom' => 'Module Cle Chauffeur', 'prix' => 50],
                ['image' => 'localisation.jpeg', 'nom' => 'Module de Localisation', 'prix' => 50],
                ['image' => 'bleutooth.jpeg', 'nom' => 'Module Bluetooth', 'prix' => 78],
                ['image' => 'vitesse.jpeg', 'nom' => 'Module Vitesse', 'prix' => 43],
                ['image' => 'cle chauffeur2.jpg', 'nom' => 'Module Cle Chauffeur', 'prix' => 50],
                ['image' => 'geolocalisation2.jpg', 'nom' => 'Module de Géolocalisation', 'prix' => 50],
                ['image' => 'camera1.jpg', 'nom' => 'Module Caméra', 'prix' => 50],
                ['image' => 'carburant2.png', 'nom' => 'Module Carburant', 'prix' => 40],
            ];
        @endphp

        @foreach ($produits as $produit)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <img src="{{ asset('images/' . $produit['image']) }}"
                     alt="{{ $produit['nom'] }}"
                     class="card-img-top"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $produit['nom'] }}</h5>
                    <p class="card-text fw-bold text-success mb-3">${{ number_format($produit['prix'], 2) }}</p>
                    {{-- <a href="#" class="btn btn-outline-primary mt-auto w-100">
                        <i class="bi bi-cart-plus me-1"></i> Ajouter au panier
                    </a> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@include('admin.footer')
@endsection
