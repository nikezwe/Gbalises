@extends('admin.admin')
@extends('layouts.app')
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
@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Liste des Types de Balises</h1>
        <a href="{{ route('admin.typebalise.create') }}" class="btn btn-primary">Ajouter un Type</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typebalises as $typebalise)
                    <tr>
                        <td>{{ $typebalise->nom }}</td>
                        <td>
                            <div class="d-flex gap-3 justify-content-end">
                                <a href="{{ route('admin.typebalise.edit', $typebalise) }}" class="btn btn-warning btn-sm">
                                    Modifier
                                </a>
                                <form action="{{ route('admin.typebalise.destroy', $typebalise) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce type de balise ?')">
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
    <div class="d-flex justify-content-center mt-3">
        {{ $typebalises->links() }}
    </div>
</div>

@endsection
