@extends('layouts.app')
@extends('admin.admin')
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

<div class="container mt-4">
    <h1>Liste des Commandes</h1>

    <!-- <div class="mb-3">
        <form action="{{ route('admin.commande.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher un utilisateur ou une commande" value="{{ request()->get('search') }}">
                <button class="btn btn-primary" type="submit">Rechercher</button>
            </div>
        </form>
    </div> -->

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom de l'utilisateur</th>
                <th>Email</th>
                <th>Commandes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->commandes->isEmpty())
                            <span class="badge bg-secondary">Aucune commande</span>
                        @else
                            <ul class="list-unstyled">
                                @foreach ($user->commandes as $commande)
                                    <li class="mb-2">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <strong>Balise :</strong> {{ $commande->balise->nom ?? 'Non spécifiée' }} <br>
                                                <strong>Quantité :</strong> {{ $commande->quantite }} <br>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>

@endsection
