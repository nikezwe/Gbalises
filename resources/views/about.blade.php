
@extends('layouts.app')
@section('title', 'À Propos')
@section('content')
		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>About Us</h1>
								<h1>MI<span class="d-block">Burundi</span></h1>
								<p class="mb-4">Découvrez notre collection exclusive de produits informatiques de qualité.</p>
								<p><a href="" class="btn btn-secondary me-2">Nos Produits</a><a href="#" class="btn btn-white-outline">Explore</a></p>
							</div>
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

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between align-items-center">
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
		<!-- End Why Choose Us Section -->

	<!-- Start Footer Section -->
	@include('partials.footer')
	<!-- End Footer Section -->

@endsection

