@extends('layouts.app')
@section('title', $commande->exists ? "Editer une commande" : "Créer une commande")

@section('content')

<h4>@yield('title')</h4>

<form method="POST" action="{{ $commande->exists ? route('admin.commande.update', $commande) : route('admin.commande.store') }}">
    @csrf
    @method($commande->exists ? 'put' : 'post')
    <div class="row">
        @include('shared.input', [
            'label' => 'Balises',
            'name' => 'balise',
            'value' => $commande->balise()->pluck('id'), // Récupère les IDs des balises associées
            'multiple' => true
        ])
        @include('shared.input', [
            'class' => 'col',
            'label' => 'Prix',
            'name' => 'prix',
            'value' => $commande->balise->prix ?? ''
        ])
    </div>
    <div>
        <button class="btn btn-primary">
            {{ $commande->exists ? 'Modifier' : 'Créer' }}
        </button>
    </div>
</form>

@endsection