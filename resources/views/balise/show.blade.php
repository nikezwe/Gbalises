@extends('layouts.app')
@extends('admin.admin')
@section('title', 'Mon Panier')

@section('content')
<div class="container py-5">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-center mb-4">🛒 Mon Panier</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('balise.index') }}">Produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Panier</li>
                </ol>
            </nav>
        </div>
    </div>

    @include('shared.flash')

    @if($cartItems->count() > 0)
        <div class="row">
            <!-- Items du panier -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Articles dans votre panier ({{ $totalItems }})</h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($cartItems as $item)
                            <div class="border-bottom p-3">
                                <div class="row align-items-center">
                                    <!-- Image du produit -->
                                    <div class="col-md-2">
                                        @if($item->balise->image)
                                            <img src="{{ asset('storage/' . $item->balise->image) }}" 
                                                 alt="{{ $item->balise->nom }}" 
                                                 class="img-fluid rounded" 
                                                 style="max-height: 80px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                 style="height: 80px; width: 80px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Informations du produit -->
                                    <div class="col-md-4">
                                        <h6 class="mb-1">{{ $item->balise->nom }}</h6>
                                        <small class="text-muted">{{ $item->balise->typebalise->nom ?? 'Non catégorisé' }}</small>
                                        <div class="text-primary fw-bold">{{ number_format($item->balise->prix, 0, '.', ' ') }} €</div>
                                    </div>

                                    <!-- Quantité -->
                                    <div class="col-md-3">
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <div class="input-group" style="width: 120px;">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decrementQuantity(this)">-</button>
                                                <input type="number" name="quantite" value="{{ $item->quantite }}" 
                                                       min="1" max="99" class="form-control text-center"
                                                       onchange="this.form.submit()">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="incrementQuantity(this)">+</button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Sous-total et actions -->
                                    <div class="col-md-2">
                                        <div class="fw-bold text-primary mb-2">
                                            {{ number_format($item->quantite * $item->balise->prix, 0, '.', ' ') }} €
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <form action="{{ route('cart.destroy', $item) }}" method="POST" 
                                              onsubmit="return confirm('Supprimer cet article du panier ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Actions du panier -->
                <div class="mt-3">
                    <a href="{{ route('balise.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> Continuer les achats
                    </a>
                    <form action="{{ route('cart.clear') }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Vider complètement le panier ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i> Vider le panier
                        </button>
                    </form>
                </div>
            </div>

            <!-- Résumé de la commande -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Résumé de la commande</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Articles ({{ $totalItems }})</span>
                            <span>{{ number_format($total, 0, '.', ' ') }} €</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Livraison</span>
                            <span class="text-success">Gratuite</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5">
                            <span>Total</span>
                            <span class="text-primary">{{ number_format($total, 0, '.', ' ') }} €</span>
                        </div>
                        
                        <div class="mt-4">
                            <a href="{{ route('commande.create') }}" class="btn btn-primary w-100 btn-lg">
                                <i class="fas fa-credit-card"></i> Passer la commande
                            </a>
                        </div>
                        
                        <div class="mt-2 text-center">
                            <small class="text-muted">
                                <i class="fas fa-lock"></i> Paiement sécurisé
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Panier vide -->
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="fas fa-shopping-cart fa-4x text-muted"></i>
            </div>
            <h3 class="text-muted mb-3">Votre panier est vide</h3>
            <p class="text-muted mb-4">Découvrez nos produits et ajoutez-les à votre panier pour passer commande.</p>
            <a href="{{ route('balise.index') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-shopping-bag"></i> Découvrir nos produits
            </a>
        </div>
    @endif
</div>

<script>
function incrementQuantity(button) {
    const input = button.previousElementSibling;
    const currentValue = parseInt(input.value);
    if (currentValue < 99) {
        input.value = currentValue + 1;
        input.form.submit();
    }
}

function decrementQuantity(button) {
    const input = button.nextElementSibling;
    const currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
        input.form.submit();
    }
}
</script>
@endsection