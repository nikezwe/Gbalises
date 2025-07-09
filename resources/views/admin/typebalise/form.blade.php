@extends('layouts.app')
@extends('admin.admin')

@section('title', $typebalises->exists ? 'Éditer le Type de Balise' : 'Ajouter un Nouveau Type de Balise')
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

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 500px;">
        <h1 class="mb-4 text-center">@yield('title')</h1>

        <form class="vstack gap-4" action="{{ route($typebalises->exists ? 'admin.typebalise.update' : 'admin.typebalise.store', $typebalises) }}" method="post">
            @csrf
            @method($typebalises->exists ? 'put' : 'post')
            <div class="form-group mb-3">
                <label for="nom" class="form-label">Nom du Type de Balise</label>
                @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $typebalises->nom) }}" placeholder="Entrez le nom du type de balise" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary w-100">
                    @if($typebalises->exists)
                        Modifier le Type
                    @else
                        Ajouter le Type
                    @endif
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
