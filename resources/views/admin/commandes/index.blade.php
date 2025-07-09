@include('admin.navbar')

@extends('admin.admin')

@section('content')
<div class="container mt-4">
    <h1>Commandes de {{ $user->name }}</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom de la balise</th>
                <th>Quantité</th>
                <th>État</th>
                <th>Date de la commande</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $commande)
                <tr>
                    <td>{{ $commande->balise->nom ?? 'Non spécifiée' }}</td>
                    <td>{{ $commande->quantite }}</td>
                    <td>
                        <span class="badge bg-{{ $commande->etat == 'Livrée' ? 'success' : 'warning' }}">
                            {{ $commande->etat }}
                        </span>
                    </td>
                    <td>{{ $commande->created_at->format('d-m-Y') }}</td> <!-- Affichage de la date -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $commandes->links() }}
</div>
@endsection
