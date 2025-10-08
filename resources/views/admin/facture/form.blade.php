
@extends('layouts.app')

@section('title', isset($facturation) ? 'Modifier la Facture' : 'Créer une Facture')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ isset($facturation) ? 'Modifier' : 'Créer' }} une Facture</h4>
                </div>

                <div class="card-body">
                    <form method="POST" 
                          action="{{ isset($facturation) ? route('admin.facturation.update', $facturation->id) : route('admin.facturation.store') }}">
                        @csrf
                        @if(isset($facturation))
                            @method('PUT')
                        @endif

                        <!-- Commande -->
                        <div class="mb-3">
                            <label for="commande_id" class="form-label">Commande</label>
                            <select name="commande_id" id="commande_id" class="form-select" required>
                                <option value="">-- Sélectionner une commande --</option>
                                @foreach($commandes as $commande)
                                    <option value="{{ $commande->id }}"
                                        {{ (isset($facturation) && $facturation->commande_id == $commande->id) ? 'selected' : '' }}>
                                        Commande #{{ $commande->id }} - {{ $commande->user->name ?? 'Client inconnu' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Montant -->
                        <div class="mb-3">
                            <label for="montant_total" class="form-label">Montant total (FBU)</label>
                            <input type="number" name="montant_total" id="montant_total" 
                                   class="form-control" step="0.01" required
                                   value="{{ old('montant_total', $facturation->montant_total ?? '') }}">
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                            <label for="date_facturation" class="form-label">Date de facturation</label>
                            <input type="date" name="date_facturation" id="date_facturation" 
                                   class="form-control" required
                                   value="{{ old('date_facturation', $facturation->date_facturation ?? now()->toDateString()) }}">
                        </div>

                        <!-- Statut -->
                        <div class="mb-3">
                            <label for="statut" class="form-label">Statut</label>
                            <select name="statut" id="statut" class="form-select" required>
                                <option value="en_attente" {{ (isset($facturation) && $facturation->statut == 'en_attente') ? 'selected' : '' }}>En attente</option>
                                <option value="payé" {{ (isset($facturation) && $facturation->statut == 'payé') ? 'selected' : '' }}>Payé</option>
                                <option value="annulé" {{ (isset($facturation) && $facturation->statut == 'annulé') ? 'selected' : '' }}>Annulé</option>
                            </select>
                        </div>

                        <!-- Boutons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.facturation.index') }}" class="btn btn-secondary">Retour</a>
                            <button type="submit" class="btn btn-success">
                                {{ isset($facturation) ? 'Mettre à jour' : 'Créer' }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
