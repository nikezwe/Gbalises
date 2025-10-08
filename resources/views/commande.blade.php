@extends('layouts.app')

@section('title', 'Passer ma commande')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow border-0">
                <div class="card-body p-5">
                    <h2 class="mb-4 text-center">📝 Finalisation de la commande</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="orderForm" method="POST" action="{{ route('commande.store') }}">
                        @csrf
                        <input type="hidden" name="nom" value="{{ $user->name }}">
                        <input type="hidden" name="email" value="{{ $user->email }}">

                        <div class="mb-3">
                            <label class="form-label">Nom complet</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <h4 class="mt-4 mb-3">🛒 Contenu du panier</h4>

                        @if($panier->isEmpty())
                            <div class="alert alert-warning">Votre panier est vide.</div>
                        @else
                            <input type="hidden" name="balises" value="{{ json_encode($panier) }}">

                            <ul class="list-group mb-3">
                                @php $total = 0; @endphp
                                @foreach($panier as $item)
                                    @php
                                        $prix = $item->balise->prix ?? 0;
                                        $total += $prix * $item->quantite;
                                    @endphp
                                    <li class="list-group-item d-flex justify-content-between align-items-start flex-wrap">
                                        <div>
                                            <strong>{{ $item->balise->nom ?? 'Produit inconnu' }}</strong><br>
                                            <small class="text-muted">Réf : {{ $item->balise->reference ?? 'N/A' }}</small>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-primary rounded-pill">
                                                {{ $item->quantite }} x {{ number_format($prix, 2, ',', ' ') }} €
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="text-end mb-4">
                                <h5 class="fw-bold">Total : {{ number_format($total, 2, ',', ' ') }} €</h5>
                            </div>
                        @endif

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg"
                                {{ $panier->isEmpty() ? 'disabled' : '' }}>
                                ✅ Valider la commande
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.footer')
@endsection
