@extends('layouts.app')
@section('title', 'Liste des Commandes')

@section('content')
    <h2>Commandes des utilisateurs</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Client</th>
                <th>Total</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Facture</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>#{{ $commande->id }}</td>
                    <td>{{ $commande->user->name }}</td>
                    <td>{{ number_format($commande->total, 2) }} Fbu</td>
                    <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($commande->statut ?? 'en attente') }}</td>
                    <td>
                        @if($commande->facture)
                            <a href="{{ route('admin.facturation.show', $commande->facture->id) }}" class="btn btn-info btn-sm">
                                Voir Facture
                            </a>
                        @else
                            <a href="{{ route('admin.facturation.create') }}?commande_id={{ $commande->id }}" class="btn btn-success btn-sm">
                                Créer Facture
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
