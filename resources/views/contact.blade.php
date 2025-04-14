@include('admin.navbar')

<div class="container py-5">
    <section class="text-center mb-5">
        <img src="{{ asset('images/micro.jpeg') }}" alt="MicroInfom" class="img-fluid rounded shadow-sm mb-4" style="max-height: 300px; object-fit: cover;">
        <h2 class="fw-bold">MicroInfom - Services de Sécurité</h2>
        <p class="text-muted">
            MICROINFORM est là pour trouver la solution adaptée aux besoins informatiques de votre entreprise, quel que soit votre secteur d'activité.<br>
            Notre staff est disponible 6 jours sur 7 pour vous aider.
        </p>
    </section>

    <section class="text-center mb-5">
        <img src="{{ asset('images/geolocalisation.jpg') }}" class="img-fluid rounded shadow-sm" style="max-height: 300px; object-fit: cover;">
    </section>

    <section class="bg-light p-5 rounded-4 shadow-sm mb-5">
        <h3 class="text-center mb-4">📩 Besoin de nous contacter ?</h3>
        @include('shared.flash')

        <form action="{{ route('contact.create') }}" method="POST" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', ['class' => 'col-md-6', 'label' => 'Nom', 'name' => 'nom'])
                @include('shared.input', ['class' => 'col-md-6', 'label' => 'Prénom', 'name' => 'prenom'])
            </div>

            <div class="row">
                @include('shared.input', ['type' => 'email', 'class' => 'col-md-6', 'label' => 'Email', 'name' => 'email'])
                @include('shared.input', ['class' => 'col-md-6', 'label' => 'Téléphone', 'name' => 'telephone'])
            </div>

            @include('shared.input', [
                'type' => 'textarea',
                'label' => 'Votre Message',
                'name' => 'message',
                'class' => 'col-12'
            ])

            <div class="text-center">
                <button class="btn btn-primary mt-3 px-4">Contacter Nous</button>
            </div>
        </form>
    </section>

    <section class="row text-center text-md-start g-4">
        <div class="col-md-6">
            <h5 class="fw-bold">📞 Téléphone</h5>
            <p>Appelez-nous au : +257 22 21 98 61 ou +257 22 24 55 00</p>
        </div>
        <div class="form_bouton">
       <!-- <a href="https://wa.me/+25767338851">Whatsapp</a>-->
        <a href="https://api.whatsapp.com/send?phone=79489976">Whatsapp</a>
    </div>

        <div class="col-md-6">
            <h5 class="fw-bold">📍 Adresse</h5>
            <p>
                PO Box 6624, Bujumbura, Mukaza<br>
                Quartier Bwiza, Avenue de l'université n°77<br>
                Burundi
            </p>
        </div>
    </section>
</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>