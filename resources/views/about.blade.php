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
								<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/cross.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>others services</h3>
									<ul>
										<li>Installation des systèmes de géolocalisation (GPS) dans des véhicules</li>
										<li>Maintenance des matériels informatiques (hardware)</li>
										<li>Informatique générale</li>
										<li>Formation sur les logiciels spécialisés</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/cle chauffeur3.jpg" alt="Image" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->
	<!-- Emplacement -->
    <div class="container py-5">
        <h2 class="text-center mb-4">Notre Emplacement</h2>
        <div class="text-center mb-4">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.8897428480122!2d29.370362639453027!3d-3.3771159966116935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19c1831eaaf88555%3A0x95213d6b5904f46!2sMicroinform%20Burundi.s.u!5e0!3m2!1sfr!2sbi!4v1744178936577!5m2!1sfr!2sbi" 
                width="100%" 
                height="450" 
                style="border:0; max-width: 100%; margin-top: 20px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>
	<!-- Start Footer Section -->
	@include('partials.footer')
	<!-- End Footer Section -->
@include('admin.footer')
@endsection

