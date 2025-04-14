<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Flotte</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap (si utilisé) -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
    .accessoires {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: auto;
        text-align: center;
        padding: 2rem;
    }
    .accessoire {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .accessoire figcaption {
        margin-bottom: 1rem;
        font-weight: bold;
    }
    .accessoire img {
        width: 100%;
        max-height: 200px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
</style>

</head>
<body>
    @include('admin.navbar')
    <header class="text-center mb-5">
        <img src="{{ asset('images/micro.jpeg') }}" alt="MicroInfom" class="img-fluid rounded shadow-sm mb-4" style="max-height: 300px; object-fit: cover;">
        <h2 class="fw-bold">MicroInfom - Services de Sécurité</h2>
        <p class="text-muted">
            MICROINFORM est là pour trouver la solution adaptée aux besoins informatiques de votre entreprise.<br>
            Notre staff est disponible 6 jours sur 7 pour vous aider.
        </p>
    </header>
    <main class="container py-5">
        <div class="row g-4">
            @php
                $services = [
                    [
                        'image' => 'geolocalisationvehicule.JPG',
                        'title' => 'GÉOLOCALISATION DES VÉHICULES',
                        'details' => [
                            'Gérez de manière simple et efficace votre flotte de véhicules.',
                            'Analyser les temps d\'arrêt et de conduite.',
                            'Optimiser la gestion de votre parc.',
                            'Programmez vos itinéraires et analysez vos points d\'intérêt.',
                        ]
                    ],
                    [
                        'image' => 'ecoconduite.JPG',
                        'title' => 'ECO CONDUITE',
                        'details' => [
                            'Améliorez les comportements de conduite.',
                            'Analysez les infractions : excès de vitesse, freinages...',
                            'Réduisez les coûts et préservez l’environnement.',
                            'Classez les scores de conduite des chauffeurs.',
                        ]
                    ],
                    [
                        'image' => 'gestioncarburant.JPG',
                        'title' => 'GESTION DU CARBURANT',
                        'details' => [
                            'Suivez vos dépenses de carburant.',
                            'Restez alerte en cas de vol.',
                            'Identifiez les abus de cartes carburant.',
                            'Générez des rapports détaillés.',
                        ]
                    ],
                    [
                        'image' => 'entretiens.JPG',
                        'title' => 'GESTION DES ENTRETIENS',
                        'details' => [
                            'Automatisez les alertes de maintenance.',
                            'Réalisez des économies avec l’entretien préventif.',
                            'Avertissez automatiquement le responsable du parc.',
                        ]
                    ],
                    [
                        'image' => 'gestiontempsconduite.JPG',
                        'title' => 'GESTION DES TEMPS DE CONDUITE',
                        'details' => [
                            'Suivez les temps de conduite et de repos en temps réel.',
                            'Contrôlez le respect des périodes de conduite.',
                            'Justifiez les frais liés à l’activité de conduite.',
                            'Respectez les obligations légales.',
                        ]
                    ],
                    [
                        'image' => 'journaltrajet.JPG',
                        'title' => 'JOURNAL DES TRAJETS',
                        'details' => [
                            'Justifiez fiscalement les trajets professionnels.',
                            'Validez les données des collaborateurs.',
                            'Générez des rapports officiels.',
                        ]
                    ],
                    [
                        'image' => 'gestionaccident.JPG',
                        'title' => 'DÉTECTION D\'ACCIDENT',
                        'details' => [
                            'Détectez les excès de vitesse.',
                            'Soyez alerté en cas d’incident.',
                            'Générez des rapports automatiques.',
                            'Analysez les données avant/après accident.',
                        ]
                    ],
                ];
            @endphp

            @foreach ($services as $service)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/' . $service['image']) }}" alt="{{ $service['title'] }}" class="card-img-top" style="object-fit: cover; height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service['title'] }}</h5>
                            @foreach ($service['details'] as $line)
                                <p class="card-text">{{ $line }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    <section>
    <h2 style="text-align: center;">ACCESSOIRES</h2>
    <section class="accessoires">
        <article class="accessoire">
            <figcaption>Clé Dallas<br><small>Permet l'identification et le démarrage sécurisé</small></figcaption>
            <img src="{{ asset('images/id dallas.JPG') }}" alt="Clé Dallas">
        </article>

        <article class="accessoire">
            <figcaption>Badge RFID<br><small>Badge personnel pour chaque conducteur</small></figcaption>
            <img src="{{ asset('images/badge rfid.JPG') }}" alt="Badge RFID">
        </article>

        <article class="accessoire">
            <figcaption>ALL-CAN300<br><small>Lecture de plus de 100 paramètres</small></figcaption>
            <img src="{{ asset('images/can.JPG') }}" alt="ALL-CAN300">
        </article>

        <article class="accessoire">
            <figcaption>LV-CAN200<br><small>Paramètres de base : kilométrage, carburant</small></figcaption>
            <img src="{{ asset('images/sonde ble.JPG') }}" alt="LV-CAN200">
        </article>

        <article class="accessoire">
            <figcaption>Sonde filaire<br><small>Mesure précise du carburant</small></figcaption>
            <img src="{{ asset('images/sonde filaire.JPG') }}" alt="Sonde filaire">
        </article>

        <article class="accessoire">
            <figcaption>Autres accessoires<br><small>Supports, boîtiers, connecteurs</small></figcaption>
            <img src="{{ asset('images/accessoires.JPG') }}" alt="Accessoires divers">
        </article>
    </section>
</section>
    @include('admin.footer')

    <!-- Bootstrap JS (si utilisé) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
