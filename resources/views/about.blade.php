@include('admin.navbar')

<section class="text-center mb-5">
        <img src="{{ asset('images/micro.jpeg') }}" alt="MicroInfom" class="img-fluid rounded shadow-sm mb-4" style="max-height: 300px; object-fit: cover;">
        <h2 class="fw-bold">MicroInfom - Services de Sécurité</h2>
        <p class="text-muted">
            MICROINFORM est là pour trouver la solution adaptée aux besoins informatiques de votre entreprise, quel que soit votre secteur d'activité.<br>
            Notre staff est disponible 6 jours sur 7 pour vous aider.
        </p>
    </section>
<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-8 mb-4 mb-md-0">
            <div class="mx-auto" style="max-width: 100%; max-height: 400px; overflow: hidden;">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/imag micro.png') }}" class="d-block w-100 img-fluid" alt="Image 1" style="object-fit: cover; height: 100%;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/imagemicro2.png') }}" class="d-block w-100 img-fluid" alt="Image 2" style="object-fit: cover; height: 100%;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button>
                </div>
            </div>
        </div>

    <div class="mb-5">
        <h2 class="text-primary">Qui sommes-nous ?</h2>

        <p>
            Fournisseur de plusieurs demandes en informatique,
            MICROINFORM assure également l'assistance et le conseil 
            en informatique.
        </p>

        <h3 class="text-secondary">MICROINFORM assure les prestations suivantes :</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Installation des systèmes de géolocalisation (GPS) dans des véhicules</li>
            <li class="list-group-item">Maintenance des matériels informatiques (hardware)</li>
            <li class="list-group-item">Informatique générale</li>
            <li class="list-group-item">Formation sur les logiciels spécialisés</li>
        </ul>

    </div>
    <div class="container py-5">
    <h2 class="text-center mb-4">Notre Emplacement</h2>
    <div class="text-center mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.8897428480122!2d29.370362639453027!3d-3.3771159966116935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19c1831eaaf88555%3A0x95213d6b5904f46!2sMicroinform%20Burundi.s.u!5e0!3m2!1sfr!2sbi!4v1744178936577!5m2!1sfr!2sbi" width="100%" height="450" style="border:0; max-width: 100%; margin-top: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
</div>
@include('admin.footer')
