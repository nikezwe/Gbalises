@extends('base')

@section('content')
<div class="container">
    <h1>Votre Panier</h1>

    @if($cart->isEmpty())
        <p>Votre panier est vide.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Balise</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item->balise->nom }}</td>
                        <td>{{ $item->quantite }}</td>
                        <td>{{ number_format($item->balise->prix, 2) }} €</td>
                        <td>{{ number_format($item->balise->prix * $item->quantite, 2) }} €</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection