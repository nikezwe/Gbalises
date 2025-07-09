@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Passer ma commande</h1>

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
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>

        <h3>Votre panier</h3>

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
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>
                            <strong>{{ $item->balise->nom ?? 'Produit inconnu' }}</strong>
                            (Réf: {{ $item->balise->reference ?? 'N/A' }})
                        </span>
                        <span>{{ $item->quantite }} x {{ number_format($prix, 2, ',', ' ') }}€</span>
                    </li>
                @endforeach
            </ul>
            <div class="mb-3 text-end">
                <strong>Total : {{ number_format($total, 2, ',', ' ') }}€</strong>
            </div>
        @endif


        <button type="submit" class="btn btn-success" {{ $panier->isEmpty() ? 'disabled' : '' }}>
            Valider la commande
        </button>
    </form>
</div>
@endsection
