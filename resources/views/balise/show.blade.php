@extends('base')
@section('title', 'Balise - ' . $balise->nom)

@section('content')

<section class="text-center mb-5">
        <img src="{{ asset('images/micro.jpeg') }}" alt="MicroInfom" class="img-fluid rounded shadow-sm mb-4" style="max-height: 300px; object-fit: cover;">
        <h2 class="fw-bold">MicroInfom - Services de Sécurité</h2>
        <p class="text-muted">
            MICROINFORM est là pour trouver la solution adaptée aux besoins informatiques de votre entreprise, quel que soit votre secteur d'activité.<br>
            Notre staff est disponible 6 jours sur 7 pour vous aider.
        </p>
    </section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow rounded-4">
                <div class="row g-0">
                    
                <div class="col-md-5 d-flex align-items-center">
                    @if($balise->image)
                        <img src="{{ asset('storage/' . $balise->image) }}" alt="{{ $balise->nom }}" class="img-fluid rounded-start w-100 h-100 object-fit-cover" style="max-height: 100%;">
                    @else
                        <img src="{{ asset('images/default-placeholder.png') }}" alt="Image par défaut" class="img-fluid rounded-start w-100 h-100 object-fit-cover" style="max-height: 100%;">
                    @endif
                </div>
                    <div class="col-md-7">
                        <div class="card-body p-4">
                            <h4 class="mb-4 text-center">Commander cette balise</h4>

                            @include('shared.flash')

                            <form action="{{ route('balise.commande',['balise'=>$balise])}}" method="post" class="vstack gap-3">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    @include('shared.input', [
                                        'class' => 'col',
                                        'label' => 'Nom',
                                        'name' => 'nom',
                                        'value' => auth()->check() ? auth()->user()->name : ''
                                    ])
                                    @include('shared.input', [
                                        'class' => 'col',
                                        'label' => 'Prénom',
                                        'name' => 'prenom',
                                        'value' => auth()->check() ? auth()->user()->prenom : ''
                                    ])
                                </div>

                                <div class="row">
                                    @include('shared.input', [
                                        'type' => 'email',
                                        'class' => 'col',
                                        'label' => 'Email',
                                        'name' => 'email',
                                        'value' => auth()->check() ? auth()->user()->email : ''
                                    ])
                                    @include('shared.input', [
                                        'class' => 'col',
                                        'label' => 'Téléphone',
                                        'name' => 'telephone',
                                        'value' => auth()->check() ? auth()->user()->telephone : ''
                                    ])
                                </div>

                                <div class="row">
                                    @include('shared.input', [
                                        'type' => 'number',
                                        'class' => 'col',
                                        'label' => 'Quantité',
                                        'name' => 'quantite',
                                        'attributes' => ['min' => 1]
                                    ])
                                </div>

                                <button class="btn btn-primary w-100 mt-3">Commander</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection