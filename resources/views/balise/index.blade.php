@extends('base')

@section('title','Nos balises')

@section('content')

<div class="container">
    <h2>Balises disponibles</h2>
    <div class="row">
        @foreach($balises as $balise)
        <div class="col-4">
            @include('balise.card')
        </div>
        @endforeach
    </div>
    <div class="container my-4">
        <div class="d-flex justify-content-center">
            {{ $balises->links() }}
        </div>
    </div>



