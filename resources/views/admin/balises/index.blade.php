@extends('admin.admin')
@include('admin.navbar')

@section('content')

<!-- Section avec image et texte centré -->
<section class="text-center mb-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
    <img src="{{ asset('images/micro.jpeg') }}" alt="MicroInfom" class="img-fluid rounded shadow-sm mb-4" style="max-height: 300px; object-fit: cover;">
    <h2 class="fw-bold">MicroInfom - Services de Sécurité</h2>
        <p class="text-muted">
            MICROINFORM est là pour trouver la solution adaptée aux besoins informatiques de votre entreprise, quel que soit votre secteur d'activité.<br>
            Notre staff est disponible 6 jours sur 7 pour vous aider.
        </p>
    </div>
</section>

<!-- Section principale avec liste des balises -->
<div class="container mt-5">
    <!-- Titre et bouton d'ajout -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des Balises</h1>
        <a href="{{ route('admin.balise.create') }}" class="btn btn-primary">Ajouter une Balise</a>
    </div>

    <!-- Tableau des Balises -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($balises as $balise)
                    <tr>
                        <td>
                            @if($balise->image)
                                <img src="{{ asset($balise->image) }}" alt="{{ $balise->nom }}" class="img-thumbnail" style="width: 100px; height: auto;">
                            @else
                                <span class="text-muted">Pas d'image</span>
                            @endif
                        </td>
                        <td>{{ $balise->nom }}</td>
                        <td>{{ number_format($balise->prix, 0, '.', ' ') }} €</td>
                        <td>{{ $balise->typebalise->nom ?? 'Non défini' }}</td>
                        <td>
                            <div class="d-flex gap-3 justify-content-end">
                                <!-- Bouton Editer -->
                                <a href="{{ route('admin.balise.edit', $balise) }}" class="btn btn-warning btn-sm">
                                    Modifier
                                </a>

                                <!-- Formulaire de suppression -->
                                <form action="{{ route('admin.balise.destroy', $balise) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette balise ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
