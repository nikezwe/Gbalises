@extends('layouts.app')

@section('title', 'Factures')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des Factures</h1>
    <a href="{{ route('admin.facturation.create') }}" class="btn btn-primary mb-3">Créer une facture</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Commande</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factures as $facture)
            <tr>
                <td>{{ $facture->id }}</td>
                <td>Commande #{{ $facture->commande_id }}</td>
                <td>{{ $facture->montant_total }} FBU</td>
                <td>{{ $facture->date_facturation }}</td>
                <td>{{ $facture->statut }}</td>
                <td>
                    <a href="{{ route('admin.facturation.edit', $facture->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                    <form action="{{ route('admin.facturation.destroy', $facture->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
