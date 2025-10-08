@extends('layouts.app')

@section('title', 'Dashboard Admin')

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
<div class="container">
    <h1 class="mb-4">Bienvenue, {{ Auth::user()->name }}</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text fs-3">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-3">
            <div class="card shadow-sm bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Commandes</h5>
                    <p class="card-text fs-3">{{ $totalCommandes }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Factures</h5>
                    <p class="card-text fs-3">{{ $totalFactures }}</p>
                </div>
            </div>
        </div> --}}

        <div class="col-md-3">
            <div class="card shadow-sm bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Balises</h5>
                    <p class="card-text fs-3">{{ $totalBalises }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')
@endsection
@push('scripts')
<script>
    // Vous pouvez ajouter des scripts spécifiques à cette page ici
    console.log('Dashboard Admin loaded');
</script>
@endpush


