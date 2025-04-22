@extends('base')
@section('content')
<div class="bg-light p-5 rb-5 text-center">
    <div class="container">
    <img src="{{asset('images/micro.jpeg')}}" alt="image"class="img-fluid"><br>
        <h2>ModulesBalises</h2>
        <p>
        Optez pour un partenaire de confiance et une solution parfaitement adaptée à vos besoin
        </p>   
    </div>
</div>

<!-- <div class="container">
    <h2>Balises disponibles</h2>
    <div class="row">
        @foreach($balises as $balise)
        <div class="col-md-3 mb-4">
            @include('balise.card')
        </div>
        @endforeach
    </div>
</div> -->

<div class="container">
    <h2>Balises disponibles</h2>
    <div class="row">
        @foreach($balises as $balise)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <a href="{{ route('balise.show', ['slug' => $balise->getSlug(), 'balise' => $balise->id]) }}">
                    @if($balise->image)
                        <img src="{{ asset('storage/' . $balise->image) }}" alt="{{ $balise->nom }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default-placeholder.png') }}" alt="Image par défaut" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @endif
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $balise->nom }}</h5>
                    <p class="card-text">{{ number_format($balise->prix, 0, '.', ' ') }} €</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection