@extends('layouts.app')
@section('content')
		<!-- Start Hero Section -->
		<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Services</h1>
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
			</div>
		<!-- End Hero Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				
				<div class="row my-5">
					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/truck.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>GÉOLOCALISATION DES VÉHICULES</h3>
							<p>Gérez de manière simple et efficace votre flotte de véhicules.,
								Analyser les temps d\'arrêt et de conduite,
								Optimiser la gestion de votre parc,
								Programmez vos itinéraires et analysez vos points d\'intérêt.
							</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/bag.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>ECO CONDUITE</h3>
							<p>Améliorez les comportements de conduite.,
								Analysez les infractions : excès de vitesse, freinages...,
								Réduisez les coûts et préservez l’environnement.,
								Classez les scores de conduite des chauffeurs.
							</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/support.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>GESTION DU CARBURANT</h3>
							<p>Suivez vos dépenses de carburant,
                            Restez alerte en cas de vol,
                            Identifiez les abus de cartes carburant,
                            Générez des rapports détaillés,</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/return.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>GESTION DES TEMPS DE CONDUITE</h3>
							<p>'Suivez les temps de conduite et de repos en temps réel.',
								Contrôlez le respect des périodes de conduite.',
								'Justifiez les frais liés à l’activité de conduite.',
								'Respectez les obligations légales.'
							</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/truck.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>JOURNAL DES TRAJETS</h3>
							<p>Justifiez fiscalement les trajets professionnels,
                               Validez les données des collaborateurs,
                               Générez des rapports officiels.
							</p>
						</div>
					</div>

					<div class="col-6 col-md-6 col-lg-3 mb-4">
						<div class="feature">
							<div class="icon">
								<img src="images/bag.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>GESTION D'ACCIDENTS</h3>
							<p>Détectez les excès de vitesse,
								Soyez alerté en cas d’incident,
								Générez des rapports automatiques,
								Analysez les données avant/après accident.
							</p>
						</div>
					</div>
					
				</div>
			
			</div>
		</div> 
		<!-- End Why Choose Us Section -->

		<!-- Start Product Section -->
		<div class="product-section pt-0">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Les Modules les plus populaires</h2>
						<p class="mb-4">nos balise populaires</p>
						{{-- <p><a href="#" class="btn">Explore</a></p> --}}
					</div>  
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="#">
							<img src="{{ asset('images/camera1.jpg') }}" class="img-fluid product-thumbnail">
							<h3 class="product-title">intelligent camera</h3>
							<strong class="product-price">$50.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
				 <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="#">
							<img src="{{ asset('images/cle chauffeur1.jpg') }}" class="img-fluid product-thumbnail">
							<h3 class="product-title">cle chauffeur</h3>
							<strong class="product-price">$78.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="#">
							<img src="images/carburant.jpg" class="img-fluid product-thumbnail">
							<h3 class="product-title">Gestion Carburant</h3>
							<strong class="product-price">$43.00</strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
					<!-- End Column 4 -->

				</div>
			</div>
		</div>
		<!-- End Product Section -->
@include('admin.footer')
@endsection


