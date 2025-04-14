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

<div class="container">
    <h2>Balises disponibles</h2>
    <div class="row">
        @foreach($balises as $balise)
        <div class="col-md-3 mb-4">
            @include('balise.card')
        </div>
        @endforeach
    </div>
</div>
@endsection