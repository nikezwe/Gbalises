@include('admin.navbar')
@extends('admin.admin')

@section('title', $balises->exists ? 'Éditer la balise' : 'Ajouter une nouvelle balise')

@section('content')

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

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 650px;">
        <h1 class="mb-4 text-center">@yield('title')</h1>

        <form class="vstack gap-4" action="{{ route($balises->exists ? 'admin.balise.update' : 'admin.balise.store', $balises) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method($balises->exists ? 'put' : 'post')
            <div class="form-group mb-3">
                <label for="image" class="form-label">Image de la Balise</label>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group mb-3">
                <label for="nom" class="form-label">Nom de la Balise</label>
                @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $balises->nom) }}" placeholder="Entrez le nom de la balise" required>
            </div>
            <div class="form-group mb-3">
                <label for="prix" class="form-label">Prix</label>
                @error('prix')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix', $balises->prix) }}" placeholder="Entrez le prix" step="0.01" required>
            </div>
            <div class="form-group mb-3">
                <label for="typebalise" class="form-label">Type de Balise</label>
                @error('typebalise_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select name="typebalise_id" id="typebalise" class="form-select" required>
                    <option value="">--Sélectionner un type de balise--</option>
                    @foreach($typebalises as $typebalise)
                        <option value="{{ $typebalise->id }}" {{ old('typebalise_id', $balises->typebalise_id) == $typebalise->id ? 'selected' : '' }}>
                            {{ $typebalise->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Entrez une description de la balise">{{ old('description', $balises->description) }}</textarea>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary w-100">
                    @if($balises->exists)
                        Modifier la Balise
                    @else
                        Ajouter la Balise
                    @endif
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
